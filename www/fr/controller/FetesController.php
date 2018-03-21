<?php 

class FetesController extends Controller{





	/**

	* ADMIN  ACTIONS

	**/

	/**

	* Liste les différents articles

	**/

	function admin_index(){

		$this->loadModel('Fete');

		$condition 				= array('online' => 1); 

		$conditionBoisson 		= array('online' => 1, 'type' => 1); 

		$conditionEntree 		= array('online' => 1, 'type' => 2); 

		$conditionPlat			= array('online' => 1, 'type' => 3); 

		$conditionDessert 		= array('online' => 1, 'type' => 4); 

		$d['boisson'] = $this->Fete->find(array(

			'conditions' => $conditionBoisson,

			'Fete.id,Fete.online,Fete.date,Fete.type,Fete.prix_menu,Fete.prix_ss_dessert,Fete.prix_ss_entree,Fete.nom,Fete.nom_en,Fete.created',

			'order'      => 'id',

		));

		$d['entree'] = $this->Fete->find(array(

			'conditions' => $conditionEntree,

			'Fete.id,Fete.online,Fete.date,Fete.type,Fete.prix_menu,Fete.prix_ss_dessert,Fete.prix_ss_entree,Fete.nom,Fete.nom_en,Fete.created',

			'order'      => 'id',

		));	

		$d['plat'] = $this->Fete->find(array(

			'conditions' => $conditionPlat,

			'Fete.id,Fete.online,Fete.date,Fete.type,Fete.prix_menu,Fete.prix_ss_dessert,Fete.prix_ss_entree,Fete.nom,Fete.nom_en,Fete.created',

			'order'      => 'id',

		));	

		$d['dessert'] = $this->Fete->find(array(

			'conditions' => $conditionDessert,

			'Fete.id,Fete.online,Fete.date,Fete.type,Fete.prix_menu,Fete.prix_ss_dessert,Fete.prix_ss_entree,Fete.nom,Fete.nom_en,Fete.created',

			'order'      => 'id',

		));	

		$d['total'] 			= $this->Fete->findCount($condition); 

		$d['totalBoisson']	 	= $this->Fete->findCount($conditionBoisson); 

		$d['totalEntree'] 		= $this->Fete->findCount($conditionEntree); 

		$d['totalPlat'] 		= $this->Fete->findCount($conditionPlat); 

		$d['totalDessert'] 		= $this->Fete->findCount($conditionDessert); 

		$this->set($d);

	}



	/**

	* Permet d'éditer un article

	**/

	function admin_edit($id = null){

		$this->loadModel('Fete'); 

		if($id === null){

			$post = $this->Fete->findFirst(array(

				'conditions' => array('online' => -1),

			));

			if(!empty($post)){

				$id = $post->id;

			}else{

				$this->Fete->save(array(

					'online' => -1,

					'created' 	 => date('Y-m-d')

				));

				$id = $this->Fete->id;

			}

		}else{

			$info = $this->Fete->findFirst(array(

				'conditions'	=>	'id='.$id

				));

				$this->set('post', $info);	

		}

		$d['id'] = $id; 

		if($this->request->data){

			if($this->Fete->validates($this->request->data)){

				$this->request->data->date = date('Y-m-d');

				$this->request->data->online = 1;

				$this->Fete->save($this->request->data);

				$this->Session->setFlash('Le contenu a bien été enregistré'); 

				$this->redirect('admin/fetes/index'); 

			}else{

				$this->Session->setFlash('Merci de corriger vos informations','error'); 

			}

			

		}else{

			$this->request->data = $this->Fete->findFirst(array(

				'conditions' => array('id'=>$id)

			));

		}

		$this->set($d);

	}



	/**

	* Permet de supprimer un article

	**/

	function admin_delete($id){

		$this->loadModel('Fete');

		$this->Fete->delete($id);

		$this->Session->setFlash('Le contenu a bien été supprimé'); 

		$this->redirect('admin/fetes/index'); 

	}

}