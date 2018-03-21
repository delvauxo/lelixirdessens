<?php 
class MenusController extends Controller{

	/**
	* Permet d'obtenir la methode menus du controller posts
	**/

	function menus(){

		$conditionBoisson 		= array('online' => 1, 'type' => 1); 
		$conditionEntree 		= array('online' => 1, 'type' => 2); 
		$conditionPlat			= array('online' => 1, 'type' => 3); 
		$conditionDessert 		= array('online' => 1, 'type' => 4); 
		$conditionEntreeBis 		= array('online' => 1, 'type' => 5); 
		$conditionEntreeUn 		= array('online' => 1, 'type' => 6); 
		$conditionEntreeDos 		= array('online' => 1, 'type' => 7); 
		$conditionEntreeTres 		= array('online' => 1, 'type' => 8); 

		$this->loadModel('Menu1');

		$d['boisson1'] 		= $this->Menu1->find(array(
			'conditions'	=> $conditionBoisson,
			'fields'			=> 'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'				=> 'id',
		));	

		$d['entree1'] 		= $this->Menu1->find(array(
			'conditions'	=> $conditionEntree,
			'fields'		=> 'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'			=> 'id',
		));	

		$d['plat1'] 			= $this->Menu1->find(array(
			'conditions'	=> $conditionPlat,
			'fields'		=> 'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'			=> 'id',
		));	

		$d['dessert1'] 		= $this->Menu1->find(array(
			'conditions'	=> $conditionDessert,
			'fields'		=> 'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'			=> 'id',
		));

		$this->loadModel('Menu2');

		$d['boisson2'] 		= $this->Menu2->find(array(
			'conditions'	=> $conditionBoisson,
			'fields'			=> 'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'				=> 'id',
		));

		$d['entree2'] 		= $this->Menu2->find(array(
			'conditions'	=> $conditionEntree,
			'fields'		=> 'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'			=> 'id',
		));

		$d['entree2bis'] 		= $this->Menu2->find(array(
			'conditions'	=> $conditionEntreeBis,
			'fields'		=> 'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'			=> 'id',
		));

		$d['plat2'] 			= $this->Menu2->find(array(
			'conditions'	=> $conditionPlat,
			'fields'		=> 'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'			=> 'id',
		));	

		$d['dessert2'] 		= $this->Menu2->find(array(
			'conditions'	=> $conditionDessert,
			'fields'		=> 'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'			=> 'id',
		));	


		$this->loadModel('Menu3');

		$d['entree3Un'] 		= $this->Menu3->find(array(
			'conditions'	=> $conditionEntreeUn,
			'fields'		=> 'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'			=> 'id',
		));	

		$d['entree3Dos'] 		= $this->Menu3->find(array(
			'conditions'	=> $conditionEntreeDos,
			'fields'		=> 'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'			=> 'id',
		));	

		$d['entree3Tres'] 		= $this->Menu3->find(array(
			'conditions'	=> $conditionEntreeTres,
			'fields'		=> 'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'			=> 'id',
		));	

		$d['plat3'] 			= $this->Menu3->find(array(
			'conditions'	=> $conditionPlat,
			'fields'		=> 'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'			=> 'id',
		));	

		$d['dessert3'] 		= $this->Menu3->find(array(
			'conditions'	=> $conditionDessert,
			'fields'		=> 'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'			=> 'id',
		));	

		$this->loadModel('Pri');

		$d['prix'] = $this->Pri->find(array(
			'fields'		=> 'Pri.id,Pri.online,Pri.date,Pri.created,Pri.prix_ss_dessert,Pri.prix_ss_entree,Pri.prix,Pri.nom,Pri.nom_en,Pri.nom_bois,Pri.nom_bois_en,Pri.prix_boisson',
			'order' 	 	=> 'id',
		));

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(
			'fields'     => 'Parametre.id,Parametre.title_for_layout_fr,Parametre.description_for_layout_fr',
			'order' 	 => 'id ASC',
		));			

		$this->layout = 'yaman';

		$this->set($d);

		}



	/**
	* ADMIN  ACTIONS
	**/
	

	/**
	* Affiche la page des menus et des prix...
	**/

	function admin_menus(){
		$this->set($d);
	}	



	/**
	* Liste les différents articles du MENU 1
	**/
	function admin_index1(){
		$this->loadModel('Menu1');
		$condition 				= array('online' => 1); 
		$conditionBoisson 		= array('online' => 1, 'type' => 1); 
		$conditionEntree 		= array('online' => 1, 'type' => 2); 
		$conditionPlat			= array('online' => 1, 'type' => 3); 
		$conditionDessert 		= array('online' => 1, 'type' => 4); 
		$d['boisson'] = $this->Menu1->find(array(
			'conditions' => $conditionBoisson,
			'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.prix_menu1,Menu1.prix_ss_dessert,Menu1.prix_ss_entree,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'      => 'id',
		));
		$d['entree'] = $this->Menu1->find(array(
			'conditions' => $conditionEntree,
			'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.prix_menu1,Menu1.prix_ss_dessert,Menu1.prix_ss_entree,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'      => 'id',
		));	
		$d['plat'] = $this->Menu1->find(array(
			'conditions' => $conditionPlat,
			'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.prix_menu1,Menu1.prix_ss_dessert,Menu1.prix_ss_entree,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'      => 'id',
		));	
		$d['dessert'] = $this->Menu1->find(array(
			'conditions' => $conditionDessert,
			'Menu1.id,Menu1.online,Menu1.date,Menu1.type,Menu1.prix_menu1,Menu1.prix_ss_dessert,Menu1.prix_ss_entree,Menu1.nom,Menu1.nom_en,Menu1.created',
			'order'      => 'id',
		));	
		$d['total'] 			= $this->Menu1->findCount($condition); 
		$d['totalBoisson']	 	= $this->Menu1->findCount($conditionBoisson); 
		$d['totalEntree'] 		= $this->Menu1->findCount($conditionEntree); 
		$d['totalPlat'] 		= $this->Menu1->findCount($conditionPlat); 
		$d['totalDessert'] 		= $this->Menu1->findCount($conditionDessert); 
		$this->set($d);
	}

	/**
	* Permet d'éditer un article du MENU 1
	**/
	function admin_edit1($id = null){
		$this->loadModel('Menu1'); 
		if($id === null){
			$post = $this->Menu1->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Menu1->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Menu1->id;
			}
		}else{
			$info = $this->Menu1->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Menu1->validates($this->request->data)){
				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Menu1->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/menus/index1'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Menu1->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}


	/**
	* Liste les différents articles du MENU 2
	**/
	function admin_index2(){
		$this->loadModel('Menu2');
		$condition 				= array('online' => 1); 
		$conditionBoisson 		= array('online' => 1, 'type' => 1); 
		$conditionEntree 		= array('online' => 1, 'type' => 2); 
		$conditionPlat			= array('online' => 1, 'type' => 3); 
		$conditionDessert 		= array('online' => 1, 'type' => 4); 
		$conditionEntreeBis 		= array('online' => 1, 'type' => 5); 
		$d['boisson'] = $this->Menu2->find(array(
			'conditions' => $conditionBoisson,
			'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.prix_menu2,Menu2.prix_ss_dessert,Menu2.prix_ss_entree,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'      => 'id',
		));
		$d['entree'] = $this->Menu2->find(array(
			'conditions' => $conditionEntree,
			'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.prix_menu2,Menu2.prix_ss_dessert,Menu2.prix_ss_entree,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'      => 'id',
		));	
		$d['entreebis'] = $this->Menu2->find(array(
			'conditions' => $conditionEntreeBis,
			'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.prix_menu2,Menu2.prix_ss_dessert,Menu2.prix_ss_entree,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'      => 'id',
		));	
		$d['plat'] = $this->Menu2->find(array(
			'conditions' => $conditionPlat,
			'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.prix_menu2,Menu2.prix_ss_dessert,Menu2.prix_ss_entree,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'      => 'id',
		));	
		$d['dessert'] = $this->Menu2->find(array(
			'conditions' => $conditionDessert,
			'Menu2.id,Menu2.online,Menu2.date,Menu2.type,Menu2.prix_menu2,Menu2.prix_ss_dessert,Menu2.prix_ss_entree,Menu2.nom,Menu2.nom_en,Menu2.created',
			'order'      => 'id',
		));	
		$d['total'] 			= $this->Menu2->findCount($condition); 
		$d['totalBoisson']	 	= $this->Menu2->findCount($conditionBoisson); 
		$d['totalEntree'] 		= $this->Menu2->findCount($conditionEntree); 
		$d['totalEntreebis'] 		= $this->Menu2->findCount($conditionEntreeBis); 
		$d['totalPlat'] 		= $this->Menu2->findCount($conditionPlat); 
		$d['totalDessert'] 		= $this->Menu2->findCount($conditionDessert); 
		$this->set($d);
	}

	/**
	* Permet d'éditer un article du MENU 2
	**/
	function admin_edit2($id = null){
		$this->loadModel('Menu2'); 
		if($id === null){
			$post = $this->Menu2->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Menu2->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Menu2->id;
			}
		}else{
			$info = $this->Menu2->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Menu2->validates($this->request->data)){
				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Menu2->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/menus/index2'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Menu2->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}


	/**
	* Liste les différents articles du MENU 2
	**/
	function admin_index3(){
		$this->loadModel('Menu3');
		$condition 				= array('online' => 1); 
		$conditionBoisson 		= array('online' => 1, 'type' => 1); 
		$conditionEntree 		= array('online' => 1, 'type' => 2); 
		$conditionPlat			= array('online' => 1, 'type' => 3); 
		$conditionDessert 		= array('online' => 1, 'type' => 4); 
		$conditionEntreeUn 		= array('online' => 1, 'type' => 6); 
		$conditionEntreeDos 		= array('online' => 1, 'type' => 7); 
		$conditionEntreeTres 		= array('online' => 1, 'type' => 8); 
		$d['boisson'] = $this->Menu3->find(array(
			'conditions' => $conditionBoisson,
			'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.prix_menu3,Menu3.prix_ss_dessert,Menu3.prix_ss_entree,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'      => 'id',
		));
		$d['entreeun'] = $this->Menu3->find(array(
			'conditions' => $conditionEntreeUn,
			'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.prix_menu3,Menu3.prix_ss_dessert,Menu3.prix_ss_entree,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'      => 'id',
		));	
		$d['entreedos'] = $this->Menu3->find(array(
			'conditions' => $conditionEntreeDos,
			'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.prix_menu3,Menu3.prix_ss_dessert,Menu3.prix_ss_entree,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'      => 'id',
		));	
		$d['entreetres'] = $this->Menu3->find(array(
			'conditions' => $conditionEntreeTres,
			'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.prix_menu3,Menu3.prix_ss_dessert,Menu3.prix_ss_entree,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'      => 'id',
		));	
		$d['plat'] = $this->Menu3->find(array(
			'conditions' => $conditionPlat,
			'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.prix_menu3,Menu3.prix_ss_dessert,Menu3.prix_ss_entree,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'      => 'id',
		));	
		$d['dessert'] = $this->Menu3->find(array(
			'conditions' => $conditionDessert,
			'Menu3.id,Menu3.online,Menu3.date,Menu3.type,Menu3.prix_menu3,Menu3.prix_ss_dessert,Menu3.prix_ss_entree,Menu3.nom,Menu3.nom_en,Menu3.created',
			'order'      => 'id',
		));	
		$d['total'] 			= $this->Menu3->findCount($condition); 
		$d['totalBoisson']	 	= $this->Menu3->findCount($conditionBoisson); 
		$d['totalEntreeUn'] 		= $this->Menu3->findCount($conditionEntreeUn); 
		$d['totalEntreeDos'] 		= $this->Menu3->findCount($conditionEntreeDos); 
		$d['totalEntreeTres'] 		= $this->Menu3->findCount($conditionEntreeTres); 
		$d['totalPlat'] 		= $this->Menu3->findCount($conditionPlat); 
		$d['totalDessert'] 		= $this->Menu3->findCount($conditionDessert); 
		$this->set($d);
	}

	/**
	* Permet d'éditer un article du MENU 2
	**/
	function admin_edit3($id = null){
		$this->loadModel('Menu3'); 
		if($id === null){
			$post = $this->Menu3->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Menu3->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Menu3->id;
			}
		}else{
			$info = $this->Menu3->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Menu3->validates($this->request->data)){
				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Menu3->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/menus/index3'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Menu3->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article du MENU 1
	**/
	function admin_delete1($id){
		$this->loadModel('Menu1');
		$this->Menu1->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/menus/index1'); 
	}

	/**
	* Permet de supprimer un article du MENU 2
	**/
	function admin_delete2($id){
		$this->loadModel('Menu2');
		$this->Menu2->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/menus/index2'); 
	}

	/**
	* Permet de supprimer un article du MENU 3
	**/
	function admin_delete3($id){
		$this->loadModel('Menu3');
		$this->Menu3->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/menus/index3'); 
	}


}