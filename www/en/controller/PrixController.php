<?php 
class PrixController extends Controller{



	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$this->loadModel('Pri');
		$condition 	= array('online' => 1); 
		$d['prix'] 		= $this->Pri->find(array(
			'conditions'	=> $condition,
			'fields'		=> 'Pri.id,Pri.online,Pri.date,Pri.created,Pri.prix_ss_dessert,Pri.prix_ss_entree,Pri.prix',
			'order'			=> 'id',
		));	
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Pri'); 
		if($id === null){
			$post = $this->Pri->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Pri->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Pri->id;
			}
		}else{
			$info = $this->Pri->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Pri->validates($this->request->data)){
				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Pri->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/prix/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Pri->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Pri');
		$this->Pri->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/prix/index'); 
	}
}