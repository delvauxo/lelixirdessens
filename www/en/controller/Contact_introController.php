<?php 
class Contact_introController extends Controller{

	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Contact_intro');
		$d['contact_intro'] = $this->Contact_intro->find(array(
			'fields'     => 'Contact_intro.id,Contact_intro.texte_fr,Contact_intro.texte_nl,Contact_intro.date',
			'order' 	 => 'id DESC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage,
		));
		$d['total'] = $this->Contact_intro->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}


	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Contact_intro'); 
			$info = $this->Contact_intro->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Contact_intro->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');
				$this->Contact_intro->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/contact_intros/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Contact_intro->findFirst(array(
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