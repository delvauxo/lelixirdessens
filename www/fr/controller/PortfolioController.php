<?php 
class PortfolioController extends Controller{

	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		// PAGINATION - Nombre d'éléments à afficher.
		// $perPage = 12; 
		$this->loadModel('Portfolio');
		$d['portfolio'] = $this->Portfolio->find(array(
			'conditions' 	=> $conditions,
			'fields'		=> 'Portfolio.id,Portfolio.online,Portfolio.created,Portfolio.titre_fr,Portfolio.titre_en,Portfolio.texte_fr,Portfolio.texte_en,Portfolio.caption_fr,Portfolio.caption_en,Portfolio.file,Portfolio.date',
			'order'      	=> 'id ASC',
			// 'limit'			=> ($perPage*($this->request->page-1)).','.$perPage
		));	
		// PAGINATION - compte le nombre d'éléments total dans la database.
		$d['total'] = $this->Portfolio->findCount($condition); 
		// PAGINATION - création du nombre de pages requises par rapport au nombre d'éléments total dans la database.
		// $d['page'] = ceil($d['total'] / $perPage); 
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Portfolio'); 
		if($id === null){
			$post = $this->Portfolio->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Portfolio->save(array(
					'online' 	=> -1,
				));
				$id = $this->Portfolio->id;
			}
		}else{
			$info = $this->Portfolio->findFirst(array(
				'conditions'	=>	'id='.$id
			));
			$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Portfolio->validates($this->request->data)){

				if(!empty($_FILES['file']['name'])){
					// Je vérifie qu'il s'agit bien d'un fichier de type 'image'...
					if(strpos($_FILES['file']['type'], 'image') !== false){
						// Création de la variable $ImageNews
						$ImageNews = $_FILES['file']['name'];
						// Je crée un array dans lequel figurent seulement les extensions acceptées, avec le type MIME qui leur est associé (qui peut varier sous IE et qu'on va donc devoir différencier) :
						$ListeExtension		= array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
						$ListeExtensionIE	= array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Il fallait une nouvelle fois qu'IE se différencie.
						// Je vérifie l'extension présumée du fichier :
						$ExtensionPresumee	= explode('.', $ImageNews);
						$ExtensionPresumee	= strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);
						if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg' || $ExtensionPresumee == 'pjpg' || $ExtensionPresumee == 'pjpeg' || $ExtensionPresumee == 'gif' || $ExtensionPresumee == 'png')
						{
							// Je vérifie que le type MIME de l'image que j'ai choisie correspond bien à son extension
							$ImageNews = getimagesize($_FILES['file']['tmp_name']);
							if($ImageNews['mime'] == $ListeExtension[$ExtensionPresumee]  || $ImageNews['mime'] == $ListeExtensionIE[$ExtensionPresumee])
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
								// Étape 1 : La largeur (en pixels)
								$NouvelleLargeur = 360;
								$NouvelleHauteur = 180;
								// Création de l'image 
								//Etape 1 :
								$NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");
				        // On va gérer la position et le redimensionnement de la grande image
				        if($TailleImageChoisie[0]>($NouvelleLargeur/$NouvelleHauteur)*$TailleImageChoisie[1] ){ $dimY=$NouvelleHauteur; $dimX=$NouvelleHauteur*$TailleImageChoisie[0]/$TailleImageChoisie[1]; $decalX=-($dimX-$NouvelleLargeur)/2; $decalY=0;}
				        if($TailleImageChoisie[0]<($NouvelleLargeur/$NouvelleHauteur)*$TailleImageChoisie[1]){ $dimX=$NouvelleLargeur; $dimY=$NouvelleLargeur*$TailleImageChoisie[1]/$TailleImageChoisie[0]; $decalY=-($dimY-$NouvelleHauteur)/2; $decalX=0;}
				        if($TailleImageChoisie[0]==($NouvelleLargeur/$NouvelleHauteur)*$TailleImageChoisie[1]){ $dimX=$NouvelleLargeur; $dimY=$NouvelleHauteur; $decalX=0; $decalY=0;}
								//Etape 2 :
        				imagecopyresampled($NouvelleImage,$ImageChoisie,$decalX,$decalY,0,0,$dimX,$dimY,$TailleImageChoisie[0],$TailleImageChoisie[1]);
								// Retrouver le nom de l'image en utilisant explode
								$NomImageChoisie = explode('.', $ImageNews);
								// Modifier le nom retrouvé pour sécuriser l'insertion
								$NomImageExploitable = time();
								// Chemin de destination pour la nouvelle image
								$dirFr = WEBROOT.DS.'img'.DS.'portfolio'; // FR
								// Si le dossier "portfolio" n'existe pas, le créer !
								if(!file_exists($dirFr)) mkdir($dirFr,0777); // FR
								// Enregistrement de l'image d'origine & redimmensionée -> Image... select
								switch ( $ExtensionPresumee ) {
									//pour le cas où l'extension est "jpeg"
									case "jpg":
									case "jpeg": 
									case "pjpg": // IE
									case "pjpeg": // IE
									// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité !
									imagejpeg($NouvelleImage , $dirFr.DS.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);
									//Enregistrement de l'image aux dimensions d'origine :
									imagejpeg($ImageChoisie , $dirFr.DS.$id.'_'.$NomImageExploitable.'_FullSize.'.$ExtensionPresumee, 100);
									break;

									// Fichiers GIF
									case "gif":
									// Pour enregistrer au format gif [redimensionée] GIF
									imagegif($NouvelleImage , $dirFr.DS.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee);
									//Enregistrement de l'image aux dimensions d'origine : GIF
									imagegif($ImageChoisie ,  $dirFr.DS.$id.'_'.$NomImageExploitable.'_FullSize.'.$ExtensionPresumee);
									break;

									// Fichiers PNG
									case "png":
									// Pour enregistrer au format gif [redimensionée] PNG
									imagepng($NouvelleImage , $dirFr.DS.$id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG
									//Enregistrement de l'image aux dimensions d'origine : PNG
									imagepng($ImageChoisie ,  $dirFr.DS.$id.'_'.$NomImageExploitable.'_FullSize.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG
									break;

									// On peut également enregistrer les formats wbmp, xbm et xpm (vérifier la configuration du serveur)
									default:
									echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";
									break;
								}

								// Je supprime l'image originale (facultatif)
								imagedestroy($ImageChoisie);
								// Déplacer si besoin le nouveau fichier
								// move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$_FILES['file']['name']);

								$this->request->data->file = $id.'_'.$NomImageExploitable.'.'.$ExtensionPresumee;
								$this->request->data->file_full = $id.'_'.$NomImageExploitable.'_FullSize.'.$ExtensionPresumee;
								$this->request->data->online = 1;
								$this->request->data->date = date("Y-m-d");
								$this->Portfolio->save($this->request->data);
								$this->Session->setFlash('Le contenu a bien été modifié.'); 
								$this->redirect('admin/portfolio/index'); 
							}else{
								$this->Session->setFlash("Il ne s'agit pas d'un fichier de type image !");
							}
						}else{
							$this->Session->setFlash("L'extension choisie pour l'image est incorrecte");
						}
					}else{
						$this->Session->setFlash("Il ne s'agit pas d'un fichier de type image !");
					}
				}else{	// Si aucune image n'a été envoyé, ne pas enregistrer le restant du contenu...
					$this->Session->setFlash('Merci de corriger vos informations, il semblerait qu\'il n\'y ai aucune image uploadée'); 
				}
			}else{	// Si ne passe pas au controle de la fonction validates() ...
					$this->Session->setFlash('Merci de corriger vos informations' ,'error'); 
			}
		}else{
				$this->request->data = $this->Portfolio->findFirst(array(
				'conditions' => array('id'=>$id)
				));
		}
		$this->set($d);
	}


	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Portfolio');
		$this->Portfolio->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/portfolio/index'); 
	}

}