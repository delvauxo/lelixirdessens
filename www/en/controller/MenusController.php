<?php 
class MenusController extends Controller{



	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$this->loadModel('Menu');
		$condition 				= array('online' => 1); 
		$conditionBoisson 		= array('online' => 1, 'type' => 1); 
		$conditionEntree 		= array('online' => 1, 'type' => 2); 
		$conditionPlat			= array('online' => 1, 'type' => 3); 
		$conditionDessert 		= array('online' => 1, 'type' => 4); 
		$d['boisson'] = $this->Menu->find(array(
			'conditions' => $conditionBoisson,
			'Menu.id,Menu.online,Menu.date,Menu.type,Menu.prix_menu,Menu.prix_ss_dessert,Menu.prix_ss_entree,Menu.nom,Menu.nom_en,Menu.created',
			'order'      => 'id',
		));
		$d['entree'] = $this->Menu->find(array(
			'conditions' => $conditionEntree,
			'Menu.id,Menu.online,Menu.date,Menu.type,Menu.prix_menu,Menu.prix_ss_dessert,Menu.prix_ss_entree,Menu.nom,Menu.nom_en,Menu.created',
			'order'      => 'id',
		));	
		$d['plat'] = $this->Menu->find(array(
			'conditions' => $conditionPlat,
			'Menu.id,Menu.online,Menu.date,Menu.type,Menu.prix_menu,Menu.prix_ss_dessert,Menu.prix_ss_entree,Menu.nom,Menu.nom_en,Menu.created',
			'order'      => 'id',
		));	
		$d['dessert'] = $this->Menu->find(array(
			'conditions' => $conditionDessert,
			'Menu.id,Menu.online,Menu.date,Menu.type,Menu.prix_menu,Menu.prix_ss_dessert,Menu.prix_ss_entree,Menu.nom,Menu.nom_en,Menu.created',
			'order'      => 'id',
		));	
		$d['total'] 			= $this->Menu->findCount($condition); 
		$d['totalBoisson']	 	= $this->Menu->findCount($conditionBoisson); 
		$d['totalEntree'] 		= $this->Menu->findCount($conditionEntree); 
		$d['totalPlat'] 		= $this->Menu->findCount($conditionPlat); 
		$d['totalDessert'] 		= $this->Menu->findCount($conditionDessert); 
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Menu'); 
		if($id === null){
			$post = $this->Menu->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Menu->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Menu->id;
			}
		}else{
			$info = $this->Menu->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Menu->validates($this->request->data)){
				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Menu->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/menus/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Menu->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Menu');
		$this->Menu->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/menus/index'); 
	}
}