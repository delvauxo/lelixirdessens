<?php 
class VinsController extends Controller{
	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$this->loadModel('Vins');
		$condition 				= array('online' => 1); 
		$conditionSuggestion 	= array('type' => 1); 
		$conditionPatron 		= array('type' => 2); 
		$conditionRouge 		= array('type' => 3); 
		$conditionBlanc 		= array('type' => 4); 
		$conditionRose 			= array('type' => 5); 
		$conditionChampagne 	= array('type' => 6); 
		$d['suggestion'] = $this->Vins->find(array(
			'conditions'	=> $conditionSuggestion,
			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.verre,Vins.date,Vins.type,Vins.online',
			'order'			=> 'entier, nom ASC',
		));	
		$d['patron'] = $this->Vins->find(array(
			'conditions'	=> $conditionPatron,
			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.verre,Vins.date,Vins.type,Vins.online',
			'order'			=> 'entier, nom ASC',
		));	
		$d['rouge'] = $this->Vins->find(array(
			'conditions'	=> $conditionRouge,
			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.verre,Vins.date,Vins.type,Vins.online',
			'order'			=> 'entier, nom ASC',
		));	
		$d['blanc'] = $this->Vins->find(array(
			'conditions'	=> $conditionBlanc,
			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.verre,Vins.date,Vins.type,Vins.online',
			'order'			=> 'entier, nom ASC',
		));	
		$d['rose'] = $this->Vins->find(array(
			'conditions'	=> $conditionRose,
			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.verre,Vins.date,Vins.type,Vins.online',
			'order'			=> 'entier, nom ASC',
		));	
		$d['champagne'] = $this->Vins->find(array(
			'conditions'	=> $conditionChampagne,
			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.verre,Vins.date,Vins.type,Vins.online',
			'order'			=> 'entier, nom ASC',
		));	
		$d['total'] 			= $this->Vins->findCount($condition); 
		$d['totalSuggestion'] 	= $this->Vins->findCount($conditionSuggestion); 
		$d['totalPatron'] 		= $this->Vins->findCount($conditionPatron); 
		$d['totalRouge'] 		= $this->Vins->findCount($conditionRouge); 
		$d['totalBlanc'] 		= $this->Vins->findCount($conditionBlanc); 
		$d['totalRose'] 		= $this->Vins->findCount($conditionRose); 
		$d['totalChampagne'] 	= $this->Vins->findCount($conditionChampagne); 
		$this->set($d);
	}


	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Vins'); 
		if($id === null){
			$post = $this->Vins->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Vins->save(array(
					'online' => -1,
				));
				$id = $this->Vins->id;
			}
		}else{
			$info = $this->Vins->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Vins->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');
				$this->Vins->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/vins/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Vins->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}


	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Vins');
		$this->Vins->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/vins/index'); 
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