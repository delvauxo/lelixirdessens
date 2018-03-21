<?php 
class ContactsController extends Controller{

	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Slide');
		$d['posts'] = $this->Slide->find(array(
			'fields'     => 'id,online,file,linkedto,caption',
			'order' 	 => 'id DESC',
			'limit'      => ($perPage*($this->request->page-1)).','.$perPage
		));
		$d['total'] = $this->Slide->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Slide'); 
		if($id === null){
			$post = $this->Slide->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Slide->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Slide->id;
			}
		}else{
			$info = $this->Slide->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Slide->validates($this->request->data)){
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'image') !== false){
						$dir = WEBROOT.DS.'slideshow/images';
						if(!file_exists($dir)) mkdir($dir,0777); 

						move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$id.'_'.$_FILES['file']['name']);
					}
				$this->request->data->file = $id.'_'.$_FILES['file']['name'];
				}

				$this->Slide->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/slides/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Slide->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Slide');
		$this->Slide->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/slides/index'); 
	}
}