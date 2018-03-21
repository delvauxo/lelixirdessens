<?php 
class H_aproposController extends Controller{

	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('H_apropos');
		$d['h_apropos'] = $this->H_apropos->find(array(
			'fields'     => 'H_apropos.id,H_apropos.titre,H_apropos.texte,H_apropos.link,H_apropos.date',
			'order' 	 => 'id DESC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
		));
		$d['total'] = $this->H_apropos->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}


	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('H_apropos'); 
		if($id === null){
			$post = $this->H_apropos->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->H_apropos->save(array(
					'online' => -1,
				));
				$id = $this->H_apropos->id;
			}
		}else{
			$info = $this->H_apropos->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->H_apropos->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');
				$this->H_apropos->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/h_apropos/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->H_apropos->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
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