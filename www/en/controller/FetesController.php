<?php 
class FetesController extends Controller{


	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$this->loadModel('Fetes');
		$condition 				= array('online' => 1); 
		$conditionBoisson 		= array('online' => 1, 'type' => 1); 
		$conditionEntree 		= array('online' => 1, 'type' => 2); 
		$conditionPlat			= array('online' => 1, 'type' => 3); 
		$conditionDessert 		= array('online' => 1, 'type' => 4); 
		$d['boisson'] = $this->Fetes->find(array(
			'conditions' => $conditionBoisson,
			'Fetes.id,Fetes.online,Fetes.date,Fetes.type,Fetes.prix_menu,Fetes.prix_ss_dessert,Fetes.prix_ss_entree,Fetes.nom,Fetes.nom_en,Fetes.created',
			'order'      => 'id',
		));
		$d['entree'] = $this->Fetes->find(array(
			'conditions' => $conditionEntree,
			'Fetes.id,Fetes.online,Fetes.date,Fetes.type,Fetes.prix_menu,Fetes.prix_ss_dessert,Fetes.prix_ss_entree,Fetes.nom,Fetes.nom_en,Fetes.created',
			'order'      => 'id',
		));	
		$d['plat'] = $this->Fetes->find(array(
			'conditions' => $conditionPlat,
			'Fetes.id,Fetes.online,Fetes.date,Fetes.type,Fetes.prix_menu,Fetes.prix_ss_dessert,Fetes.prix_ss_entree,Fetes.nom,Fetes.nom_en,Fetes.created',
			'order'      => 'id',
		));	
		$d['dessert'] = $this->Fetes->find(array(
			'conditions' => $conditionDessert,
			'Fetes.id,Fetes.online,Fetes.date,Fetes.type,Fetes.prix_menu,Fetes.prix_ss_dessert,Fetes.prix_ss_entree,Fetes.nom,Fetes.nom_en,Fetes.created',
			'order'      => 'id',
		));	
		$d['total'] 			= $this->Fetes->findCount($condition); 
		$d['totalBoisson']	 	= $this->Fetes->findCount($conditionBoisson); 
		$d['totalEntree'] 		= $this->Fetes->findCount($conditionEntree); 
		$d['totalPlat'] 		= $this->Fetes->findCount($conditionPlat); 
		$d['totalDessert'] 		= $this->Fetes->findCount($conditionDessert); 
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Fetes'); 
		if($id === null){
			$post = $this->Fetes->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Fetes->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Fetes->id;
			}
		}else{
			$info = $this->Fetes->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Fetes->validates($this->request->data)){
				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Fetes->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/fetes/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Fetes->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Fetes');
		$this->Fetes->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/fetes/index'); 
	}
}