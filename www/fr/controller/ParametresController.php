<?php 
class ParametresController extends Controller{



	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Parametre');
		$d['parametres'] = $this->Parametre->find(array(
			'conditions' => $conditions,
			'fields'     => 'Parametre.id,Parametre.online,Parametre.page,Parametre.title_for_layout_fr,Parametre.title_for_layout_en,Parametre.description_for_layout_fr,Parametre.description_for_layout_en,Parametre.date',
			'order'      => 'id ASC',
			'limit'			=> ($perPage*($this->request->page-1)).','.$perPage
		));	
		$d['total'] = $this->Parametre->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Parametre'); 
		if($id === null){
			$post = $this->Parametre->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Parametre->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Parametre->id;
			}
		}else{
			$info = $this->Parametre->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Parametre->validates($this->request->data)){
				$this->request->data->online = 1;
				$this->request->data->date = date('Y-m-d');
				$this->Parametre->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/parametres/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Parametre->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Parametre');
		$this->Parametre->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/parametres/index'); 
	}
}