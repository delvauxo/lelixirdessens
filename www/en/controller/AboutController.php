<?php 
class AboutController extends Controller{
	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('About');
		$d['posts'] = $this->About->find(array(
			'fields'     => 'About.id,About.online,About.description,About.description_nl,About.date',
			'order' 	 => 'id DESC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
		));
		$d['total'] = $this->About->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}


	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('About'); 
		if($id === null){
			$post = $this->About->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->About->save(array(
					'online' => -1,
				));
				$id = $this->About->id;
			}
		}else{
			$info = $this->About->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->About->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');
				$this->About->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/about/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->About->findFirst(array(
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