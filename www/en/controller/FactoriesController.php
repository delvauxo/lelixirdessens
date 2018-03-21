<?php 
class FactoriesController extends Controller{

	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Factory');
		$d['factories'] = $this->Factory->find(array(
			'conditions' => $conditions,
			'fields'     => 'Factory.id,Factory.online,Factory.name,Factory.country,Factory.street,Factory.city,Factory.phone,Factory.fax,Factory.email,Factory.website,Factory.file',
			'order'      => 'id ASC',
			'limit'			=> ($perPage*($this->request->page-1)).','.$perPage
		));	
		$d['total'] = $this->Factory->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Factory'); 
		if($id === null){
			$post = $this->Factory->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Factory->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Factory->id;
			}
		}else{
			$info = $this->Factory->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Factory->validates($this->request->data)){
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'image') !== false){
						
						$dirFr = WEBROOT.DS.'logofacto'; // FR
						$dirNl = '/homez.532/vanandva/www/nl/webroot'.DS.'logofacto'; // NL
						
						if(!file_exists($dirFr)) mkdir($dirFr,0777); // FR
						if(!file_exists($dirNl)) mkdir($dirNl,0777); // NL

						move_uploaded_file($_FILES['file']['tmp_name'],$dirFr.DS.$id.'_'.$_FILES['file']['name']); // FR
						copy($dirFr.DS.$id.'_'.$_FILES['file']['name'], $dirNl.DS.$id.'_'.$_FILES['file']['name']); // NL

					}
				$this->request->data->file = $id.'_'.$_FILES['file']['name'];
				}

				$this->Factory->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/factories/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Factory->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Factory');
		$this->Factory->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/factories/index'); 
	}
}