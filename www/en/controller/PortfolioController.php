<?php 
class PortfolioController extends Controller{



	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Portfolio');
		$d['portfolio'] = $this->Portfolio->find(array(
			'conditions' 	=> $conditions,
			'fields'		=> 'Portfolio.id,Portfolio.online,Portfolio.created,Portfolio.titre_fr,Portfolio.titre_nl,Portfolio.texte_fr,Portfolio.texte_nl,Portfolio.caption_fr,Portfolio.caption_nl,Portfolio.file,Portfolio.date',
			'order'      	=> 'id ASC',
			'limit'			=> ($perPage*($this->request->page-1)).','.$perPage
		));	
		$d['total'] = $this->Portfolio->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Portfolio'); 
		if($id === null){
			$post = $this->Portfolio->findFirst(array(
				'conditions' => array('online' => -1),
			));
			if(!empty($post)){
				$id = $post->id;
			}else{
				$this->Portfolio->save(array(
					'online' => -1,
					'created' 	 => date('Y-m-d')
				));
				$id = $this->Portfolio->id;
			}
		}else{
			$info = $this->Portfolio->findFirst(array(
				'conditions'	=>	'id='.$id
				));
				$this->set('post', $info);	
		}
		$d['id'] = $id; 
		if($this->request->data){
			if($this->Portfolio->validates($this->request->data)){
				if(!empty($_FILES['file']['name'])){
					if(strpos($_FILES['file']['type'], 'image') !== false){
						
						$dirFr = WEBROOT.DS.'img'.DS.'portfolio'; // FR
						$dirNl = '/homez.378/poivreet/www/pes/nl/webroot'.DS.'img'.DS.'portfolio'; // NL
						
						if(!file_exists($dirFr)) mkdir($dirFr,0777); // FR
						if(!file_exists($dirNl)) mkdir($dirNl,0777); // NL

						move_uploaded_file($_FILES['file']['tmp_name'],$dirFr.DS.$id.'_'.$_FILES['file']['name']); // FR
						copy($dirFr.DS.$id.'_'.$_FILES['file']['name'], $dirNl.DS.$id.'_'.$_FILES['file']['name']); // NL

					}
				$this->request->data->file = $id.'_'.$_FILES['file']['name'];
				}

				$this->request->data->date = date('Y-m-d');
				$this->request->data->online = 1;
				$this->Portfolio->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été enregistré'); 
				$this->redirect('admin/portfolio/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}else{
			$this->request->data = $this->Portfolio->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Portfolio');
		$this->Portfolio->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/portfolio/index'); 
	}
}