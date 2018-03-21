<?php 
class CarteController extends Controller{
	
	/**

	* Permet d'obtenir la methode carte du controller posts

	**/

	function carte(){

		$perPage = 100; 

		$this->loadModel('Carte');

		$conditionSuggestion 	= array('online' => 1);

		$conditionEntree 	= array('online' => 1, 'type' => 1); 

		$conditionPlat 	= array('online' => 1, 'type' => 2); 

		$conditionDessert 	= array('online' => 1, 'type' => 3); 

		$d['entree'] = $this->Carte->find(array(

			'conditions'	=> $conditionEntree,

			'fields'		=> 'Carte.id,Carte.online,Carte.created,Carte.nom_fr,Carte.nom_en,Carte.description_fr,Carte.description_en,Carte.type,Carte.prix',

			'order'		=> 'prix, nom_fr ASC',

			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage

		));	

		$d['plat'] = $this->Carte->find(array(

			'conditions'	=> $conditionPlat,

			'fields'		=> 'Carte.id,Carte.online,Carte.created,Carte.nom_fr,Carte.nom_en,Carte.description_fr,Carte.description_en,Carte.type,Carte.prix',

			'order'		=> 'prix, nom_fr ASC',

			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage

		));	

		$d['dessert'] = $this->Carte->find(array(

			'conditions'	=> $conditionDessert,

			'fields'		=> 'Carte.id,Carte.online,Carte.created,Carte.nom_fr,Carte.nom_en,Carte.description_fr,Carte.description_en,Carte.type,Carte.prix',

			'order'		=> 'prix, nom_fr ASC',

			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage

		));	

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_fr,Parametre.description_for_layout_fr',

			'order' 	 => 'id ASC',

		));

		$this->loadModel('Sixe');
		
		$d['suggestion'] = $this->Sixe->find(array(
		
			'conditions'	=> $conditionSuggestion,
		
			'fields'     => 'Sixe.id,Sixe.texte_fr,Sixe.texte_en,Sixe.titre_fr,Sixe.titre_en,Sixe.prix,Sixe.online,Sixe.created',
		
			'order' 	 => 'prix ASC',
		
		));

		$d['total'] = $this->Carte->findCount($condition); 

		$d['page'] = ceil($d['total'] / $perPage);	

		$this->layout = 'yaman';

		$this->set($d);

	}




	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$this->loadModel('Carte');
		$this->loadModel('Sixe');
		$condition 			= array('online' => 1); 
		$conditionSuggestion 	= array('online' => 1); 
		$conditionEntree 	= array('online' => 1, 'type' => 1); 
		$conditionPlat 	= array('online' => 1, 'type' => 2); 
		$conditionDessert 	= array('online' => 1, 'type' => 3); 
		$this->loadModel('Sixe');
		$d['suggestion'] = $this->Sixe->find(array(
			'conditions'	=> $conditionSuggestion,
			'fields'     => 'Sixe.id,Sixe.texte_fr,Sixe.texte_en,Sixe.titre_fr,Sixe.titre_en,Sixe.prix,Sixe.online,Sixe.created,Sixe.date',
			'order' 	 => 'prix ASC',
		));
		$d['entree'] = $this->Carte->find(array(
			'conditions'	=> $conditionEntree,
			'fields'		=> 'Carte.id,Carte.online,Carte.created,Carte.nom_fr,Carte.nom_en,Carte.description_fr,Carte.description_en,Carte.type,Carte.prix,Carte.date',
			'order'		=> 'prix ASC',
		));	
		$d['plat'] = $this->Carte->find(array(
			'conditions'	=> $conditionPlat,
			'fields'		=> 'Carte.id,Carte.online,Carte.created,Carte.nom_fr,Carte.nom_en,Carte.description_fr,Carte.description_en,Carte.type,Carte.prix,Carte.date',
			'order'		=> 'prix ASC',
		));	
		$d['dessert'] = $this->Carte->find(array(
			'conditions'	=> $conditionDessert,
			'fields'		=> 'Carte.id,Carte.online,Carte.created,Carte.nom_fr,Carte.nom_en,Carte.description_fr,Carte.description_en,Carte.type,Carte.prix,Carte.date',
			'order'		=> 'prix ASC',
		));	
		$d['total'] = $this->Carte->findCount($condition); 
		$d['totalSuggestion'] = $this->Sixe->findCount($conditionSuggestion); 
		$d['totalEntree'] = $this->Carte->findCount($conditionEntree); 
		$d['totalPlat'] = $this->Carte->findCount($conditionPlat); 
		$d['totalDessert'] = $this->Carte->findCount($conditionDessert); 
		$this->set($d);
	}


	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Carte'); 
		if($id === null){
			$post = $this->Carte->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Carte->save(array(
					'online' => -1,
				));
				$id = $this->Carte->id;
			}
		}else{
			$info = $this->Carte->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Carte->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');
				$this->Carte->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/carte/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Carte->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}


	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Carte');
		$this->Carte->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/carte/index'); 
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