<?php 
class SixeController extends Controller{
	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Sixe');
		$d['posts'] = $this->Sixe->find(array(
			'fields'     => 'Sixe.id,Sixe.texte_fr,Sixe.texte_en,Sixe.titre_fr,Sixe.titre_en,Sixe.date,Sixe.prix',
			'order' 	 => 'id ASC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
		));
		$d['total'] = $this->Sixe->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}


	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Sixe'); 
		if($id === null){
			$post = $this->Sixe->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Sixe->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Sixe->id;
			}
		}else{
			$info = $this->Sixe->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Sixe->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');
				// Résoud Problème d'affichage des " ' " dans les popovers...
				$this->request->data->texte_fr = str_replace("\\", "\\\\", $this->request->data->texte_fr);
				$this->Sixe->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/sixe/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Sixe->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Sixe');
		$this->Sixe->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé.'); 
		$this->redirect('admin/sixe/index'); 
	}

	/**
	* Permet de lister les contenus
	**/
	function admin_tinymce(){
		$this->loadModel('Post');
		$this->layout = 'modal'; 
		$d['posts'] = $this->Post->find();
		$this->set($d);
	}

}