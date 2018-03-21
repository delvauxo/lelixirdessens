<?php 
class CataloguesController extends Controller{

	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 5; 
		$this->loadModel('Catalogue');
		$d['catalogues'] = $this->Catalogue->find(array(
			'conditions' => $conditions,
			'fields'     => 'Catalogue.id,Catalogue.online,Catalogue.name,Catalogue.file,Category.name as catname',
			'order'      => 'id ASC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
			'join'       => array('categories as Category'=>'Category.id=Catalogue.category_id')
		));	
		$d['total'] = $this->Catalogue->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Catalogue'); 
		if($id === null){
			$post = $this->Catalogue->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Catalogue->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Catalogue->id;
			}
		}else{
			$info = $this->Catalogue->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Catalogue->validates($this->request->data)) {
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'application/pdf') !== false) {

						$dir = WEBROOT.DS.'pdf';
						if(!file_exists($dir)) mkdir($dir,0777); 
						
						$goodName = str_replace ( ' ', '_', $_FILES['file']['name']);

						// Deplace le fichier original FR
						move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$goodName);

						// Copy du fichier pour la version NL
						$dir4IdFr =  '/homez.532/vanandva/www/nl/webroot/pdf';
						if(!file_exists($dir4IdFr)) mkdir($dir4IdFr,0777); 
						copy($dir.DS.$goodName, '/homez.532/vanandva/www/nl/webroot/pdf'.DS.$goodName); // NL

						$this->request->data->file = $goodName;
					}

					$this->Catalogue->save($this->request->data);
					$this->Session->setFlash('Le contenu a bien été enregistré'); 
					$this->redirect('admin/catalogues/index'); 
				}else{
					$this->Catalogue->save($this->request->data);
					$this->Session->setFlash('Le contenu a bien été enregistré'); 
					$this->redirect('admin/catalogues/index'); 
				}
			}else{
				$this->Session->setFlash('Les données que vous avez introduites comportent une erreur !','error'); 				
			}
			
		}else{
			$this->request->data = $this->Catalogue->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		// On veut un sélecteur de catégorie donc on récup la liste des catégories
		$this->loadModel('Category');
		$d['categories'] = $this->Category->findList(); 		
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Catalogue');
		$cata = $this->Catalogue->findFirst(array(
			'conditions' => array('id'=>$id)
		));
		$nomFile = explode('/', $cata->file);
		if (!empty($cata->file)) {
		// Suppression des fichiers
		unlink(WEBROOT.DS.'pdf'.DS.$cata->file); // FR
		unlink('/homez.532/vanandva/www/nl/webroot'.DS.'pdf'.DS.$cata->file); // NL
		}
		$this->Catalogue->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/catalogues/index'); 
	}
}