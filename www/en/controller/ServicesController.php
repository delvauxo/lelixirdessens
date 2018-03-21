<?php 
class ServicesController extends Controller{



	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Service');
		$d['services'] = $this->Service->find(array(
			'conditions' => $conditions,
			'fields'     => 'Service.id,Service.online,Service.created,Service.titre_fr,Service.texte_fr,Service.titre_nl,Service.texte_nl,Service.file,Service.date',
			'order'      => 'id ASC',
			'limit'			=> ($perPage*($this->request->page-1)).','.$perPage
		));	
		$d['total'] = $this->Service->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Service'); 
		if($id === null){
			$post = $this->Service->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Service->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Service->id;
			}
		}else{
			$info = $this->Service->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Service->validates($this->request->data)){
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'image') !== false){
						
						$dirFr = WEBROOT.DS.'img'.DS.'services'; // FR
						$dirNl = '/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.'services'; // NL
						
						if(!file_exists($dirFr)) mkdir($dirFr,0777); // FR
						if(!file_exists($dirNl)) mkdir($dirNl,0777); // NL

						move_uploaded_file($_FILES['file']['tmp_name'],$dirFr.DS.$id.'_'.$_FILES['file']['name']); // FR
						copy($dirFr.DS.$id.'_'.$_FILES['file']['name'], $dirNl.DS.$id.'_'.$_FILES['file']['name']); // NL

					}
				$this->request->data->file = $id.'_'.$_FILES['file']['name'];
				}

				$this->request->data->online = 1;
				$this->Service->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/services/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Service->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Service');
		$this->Service->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/services/index'); 
	}
}