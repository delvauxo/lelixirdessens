<?php 
class ValeursController extends Controller{



	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Valeur');
		$d['valeurs'] = $this->Valeur->find(array(
			'conditions' => $conditions,
			'fields'     => 'Valeur.id,Valeur.online,Valeur.created,Valeur.titre_fr,Valeur.texte_fr,Valeur.titre_nl,Valeur.texte_nl,Valeur.file,Valeur.date',
			'order'      => 'id ASC',
			'limit'			=> ($perPage*($this->request->page-1)).','.$perPage
		));	
		$d['total'] = $this->Valeur->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Valeur'); 
		if($id === null){
			$post = $this->Valeur->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Valeur->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Valeur->id;
			}
		}else{
			$info = $this->Valeur->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Valeur->validates($this->request->data)){
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'image') !== false){
						
						$dirFr = WEBROOT.DS.'img'.DS.'valeurs'; // FR
						$dirNl = '/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.'valeurs'; // NL
						
						if(!file_exists($dirFr)) mkdir($dirFr,0777); // FR
						if(!file_exists($dirNl)) mkdir($dirNl,0777); // NL

						move_uploaded_file($_FILES['file']['tmp_name'],$dirFr.DS.$id.'_'.$_FILES['file']['name']); // FR
						copy($dirFr.DS.$id.'_'.$_FILES['file']['name'], $dirNl.DS.$id.'_'.$_FILES['file']['name']); // NL

					}
				$this->request->data->file = $id.'_'.$_FILES['file']['name'];
				}

				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Valeur->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/valeurs/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Valeur->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Valeur');
		$this->Valeur->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/valeurs/index'); 
	}
}