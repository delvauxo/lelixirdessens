<?php 
class ContractController extends Controller{

	/**
	* Permet d'obtenir la methode Contract Job du controller Contract
	**/
	function contract(){
		$this->loadModel('Contract');
		$d['contract'] = $this->Contract->find(array(
			'fields'		=> 'Contract.id,Contract.description',
			'order'		=> 'id ASC'
		));			
		$this->layout = 'same4all';
		$this->set($d);
	}


	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Contract');
		$d['contract'] = $this->Contract->find(array(
			'conditions' => $conditions,
			'fields'     => 'Contract.id,Contract.description',
			'order'      => 'id ASC'
		));	
		$d['total'] = $this->Contract->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Contract'); 
		if($id === null){
			$post = $this->Contract->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Contract->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Contract->id;
			}
		}else{
			$info = $this->Contract->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Contract->validates($this->request->data)){
				$this->Contract->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/contract/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Contract->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Contract');
		$this->Contract->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/contract/index'); 
	}
}