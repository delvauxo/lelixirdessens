<?php 
class SlidesController extends Controller{

	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 5; 
		$this->loadModel('Slide');
		$d['posts'] = $this->Slide->find(array(
			'fields'     => 'id,titre,online,file,file_tmb,linkedto,caption,date',
			'order' 	 => 'id ASC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage
		));
		$d['total'] = $this->Slide->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Slide'); 
		if($id === null){+
			$post = $this->Slide->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Slide->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Slide->id;
			}
		}else{
			$info = $this->Slide->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Slide->validates($this->request->data)){
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'image') !== false){
						// FR Création des dossier pour l'originale et pour la thumb s'ils n'existent pas encore...
						$dirNl = WEBROOT.DS.'slideshow/images';
						$dirNltmb = WEBROOT.DS.'slideshow/images/tmb';
						if(!file_exists($dirNl)) mkdir($dirNl,0777); 
						if(!file_exists($dirNltmb)) mkdir($dirNltmb,0777); 

						// NL  Création des dossier pour l'originale et pour la thumb s'ils n'existent pas encore...
						$dirFr = '/homez.378/poivreet/www/pes/nl/webroot/slideshow'.DS.'images';
						$dirFrtmb = '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.'tmb';
						if(!file_exists($dirFr)) mkdir($dirFr,0777); 
						if(!file_exists($dirFrtmb)) mkdir($dirFrtmb,0777); 						

						// Création de la variable $ImageSlide
						$ImageSlide = $_FILES['file']['name'];

						// Je crée un array dans lequel figurent seulement les extensions acceptées, avec le type MIME qui leur est associé (qui peut varier sous IE et qu'on va donc devoir différencier) :
						$ListeExtension	= array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
						$ListeExtensionIE	= array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Il fallait une nouvelle fois qu'IE se différencie.

						// Je vérifie l'extension présumée du fichier :
						$ExtensionPresumee	= explode('.', $ImageSlide);
						$ExtensionPresumee	= strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);
						if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg' || $ExtensionPresumee == 'pjpg' || $ExtensionPresumee == 'pjpeg' || $ExtensionPresumee == 'gif' || $ExtensionPresumee == 'png')
						{
							// Je vérifie que le type MIME de l'image que j'ai choisie correspond bien à son extension
							$ImageSlide = getimagesize($_FILES['file']['tmp_name']);
							if($ImageSlide['mime'] == $ListeExtension[$ExtensionPresumee]  || $ImageSlide['mime'] == $ListeExtensionIE[$ExtensionPresumee])
							{

								// ImageCreateFrom... select
								switch ( $ExtensionPresumee ) {
									//pour le cas où l'extension est "jpeg"
									case "jpg":
									case "jpeg": 
									case "pjpg": // IE
									case "pjpeg": // IE
									$ImageChoisie = imagecreatefromjpeg( $_FILES['file']['tmp_name'] );
									break;

									// Fichiers GIF
									case "gif":
									$ImageChoisie = imagecreatefromgif( $_FILES['file']['tmp_name'] );
									break;

									// Fichiers PNG
									case "png":
									$ImageChoisie = imagecreatefrompng( $_FILES['file']['tmp_name'] );
									break;

									// On peut également ouvrir les formats wbmp, xbm et xpm (vérifier la configuration du serveur)

									default:
									echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";
									break;
								}

								// Je récupére les dimensions du fichier posté
								$TailleImageChoisie	= getimagesize($_FILES['file']['tmp_name']);

								// Je redimmensionne la nouvelle image
								// Étape 1 : La largeur
								$NouvelleLargeur = 958;
								// Étape 2 : Je calcule le pourcentage de réduction qui correspond au quotient de l'ancienne largeur par la nouvelle. Comme c'est un pourcentage, on multiplie le résultat par 100.
								$Reduction = ( ($NouvelleLargeur * 100)/$TailleImageChoisie[0] );
								// Étape 3 : Je détermine la hauteur de la nouvelle image en appliquant le pourcentage de réduction à l'ancienne hauteur.
								$NouvelleHauteur = ( ($TailleImageChoisie[1] * $Reduction)/100 );

								// Création de l'image 
								//Etape 1 :
								$NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");
								//Etape 2 :
								imagecopyresampled($NouvelleImage , $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);

								// Retrouver le nom de l'image en utilisant explode
								$NomImageChoisie = explode('.', $ImageSlide);

								// Modifier le nom retrouvé pour sécuriser l'insertion
								$NomImageExploitable = time();

								// Chemin de destination pour la nouvelle image
								$dir = WEBROOT.DS.'slideshow'.DS.'images';

								// Enregistrement de l'image d'origine & redimmensionée -> Image... select
								switch ( $ExtensionPresumee ) {
									//pour le cas où l'extension est "jpeg"
									case "jpg":
									case "jpeg": 
									case "pjpg": // IE
									case "pjpeg": // IE
									// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité ! NL
									imagejpeg($NouvelleImage , '/homez.378/poivreet/www/pes/nl/webroot/slideshow'.DS.'images'.DS.'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);

									// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité ! FR
									imagejpeg($NouvelleImage , '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);

									//Enregistrement de l'image aux dimensions d'origine : NL
									imagejpeg($ImageChoisie ,  '/homez.378/poivreet/www/pes/nl/webroot/slideshow'.DS.'images'.DS.$id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 100);

									//Enregistrement de l'image aux dimensions d'origine : FR
									imagejpeg($ImageChoisie , '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.$id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 100);
									break;

									// Fichiers GIF
									case "gif":
									// Pour enregistrer au format gif [redimensionée] GIF NL
									imagegif($NouvelleImage , '/homez.378/poivreet/www/nl/webroot/slideshow'.DS.'images'.DS.'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee);

									// Pour enregistrer au format gif [redimensionée] GIF FR
									imagegif($NouvelleImage , '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee);

									//Enregistrement de l'image aux dimensions d'origine : GIF 
									imagegif($ImageChoisie ,  '/homez.378/poivreet/www/nl/webroot/slideshow'.DS.'images'.DS.$id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee);

									//Enregistrement de l'image aux dimensions d'origine : GIF FR
									imagegif($ImageChoisie , '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.$id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee);
									break;

									// Fichiers PNG
									case "png":
									// Pour enregistrer au format gif [redimensionée] PNG NL
									imagepng($NouvelleImage , '/homez.378/poivreet/www/nl/webroot/slideshow'.DS.'images'.DS.'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG

									// Pour enregistrer au format gif [redimensionée] PNG FR
									imagepng($NouvelleImage , '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG

									//Enregistrement de l'image aux dimensions d'origine : PNG NL
									imagepng($ImageChoisie ,  '/homez.378/poivreet/www/nl/webroot/slideshow'.DS.'images'.DS.$id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG

									//Enregistrement de l'image aux dimensions d'origine : PNG FR
									imagepng($ImageChoisie , '/homez.378/poivreet/www/fr/webroot/slideshow'.DS.'images'.DS.$id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG
									break;

									// On peut également enregistrer les formats wbmp, xbm et xpm (vérifier la configuration du serveur)

									default:
									echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";
									break;
								}


								// Je supprime l'image originale (facultatif)
								imagedestroy($ImageChoisie);


								// Déplacer si  besoin le nouveau fichier...
								// move_uploaded_file($_FILES['file']['tmp_name'],$dirNl.DS.$id.'_'.$_FILES['file']['name']);

								$this->request->data->file = $id.'_'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee;
								$this->request->data->file_tmb = 'tmb/'.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee;
							}

						}
						$this->request->data->date = date("Y-m-d");
						$this->Slide->save($this->request->data);
						$this->Session->setFlash('Le contenu a bien été enregistré'); 
						$this->redirect('admin/slides/index'); 
					}
				}else{
					$this->request->data->date = date("Y-m-d");
					$this->Slide->save($this->request->data);
					$this->Session->setFlash('Le contenu a bien été enregistré'); 
					$this->redirect('admin/slides/index'); 					
				}
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Slide->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Slide');
		$slide = $this->Slide->findFirst(array(
			'conditions' => array('id'=>$id)
		));
		if (!empty($slide->file)) {
		// Suppression des fichiers
		if(!empty($slide->file)){ unlink(WEBROOT.DS.'slideshow'.DS.'images'.DS.$slide->file);} // FR
		if(!empty($slide->file)){ unlink('/homez.374/microweb/www/nl/webroot'.DS.'slideshow'.DS.'images'.DS.$slide->file);} // NL
		//Suppression des fichiers thumbs
		if(!empty($slide->file)){ unlink('/homez.374/microweb/www/fr/webroot'.DS.'slideshow'.DS.'images'.DS.$slide->file_tmb);} // FR
		if(!empty($slide->file)){ unlink('/homez.374/microweb/www/nl/webroot'.DS.'slideshow'.DS.'images'.DS.$slide->file_tmb);} // NL		
		}
		$this->Slide->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/slides/index'); 
	}
}