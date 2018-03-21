<?php 
class CustomersController extends Controller{

	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Customer');
		$d['posts'] = $this->Customer->find(array(
			'fields'     => 'id, online, societe, nom , prenom, rue, codep, pays, email, fixe, mobile, website, secteur, tracking',
			'order' 	 => 'id ASC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage
		));
		$d['total'] = $this->Customer->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Customer'); 
		if($id === null){
			$post = $this->Customer->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Customer->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Customer->id;
			}
		}else{
			$info = $this->Customer->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Customer->validates($this->request->data)){
				$this->request->data->online = 1;
				$this->Customer->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/customers/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Customer->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Customer');
		$this->Customer->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/customers/index'); 
	}

	/**
	* Permet de lister les contenus
	**/
	function admin_tinymce(){
		$this->loadModel('Customer');
		$this->layout = 'modal'; 
		$d['posts'] = $this->Customer->find();
		$this->set($d);
	}	
}