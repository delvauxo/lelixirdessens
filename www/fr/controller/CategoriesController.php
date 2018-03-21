<?php 
class CategoriesController extends Controller{
	
	/**
	* Permet de récup la liste des catégories pour le blog
	**/
	function index(){
		$this->loadModel('Category');
		$cats = $this->Category->find(); 
		return $cats; 
	}

	
	/**
	* ADMIN  ACTIONS
	**/
	/**
	* Liste les différents articles
	**/
	function admin_index(){
		$perPage = 10; 
		$this->loadModel('Category');
		$condition = array('category'=>'oui'); 
		$d['categories'] = $this->Category->find(array(
			'conditions'	=> $condition,
			'fields'		=> 'Category.id,Category.name,Category.date',						
			'order'		=> 'name ASC',										
			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage				
		));
		$d['total'] = $this->Category->findCount($condition); 
		$d['page'] = ceil($d['total'] / $perPage);		
		$this->set($d);
	}

	/**
	* Permet d'éditer un article
	**/
	function admin_edit($id = null){
		$this->loadModel('Category'); 
		
		if($this->request->data){
			if($this->Category->validates($this->request->data)){
				$charsOk = array(" ", "'");
				if (empty($this->request->data->slug)) {
					$this->request->data->slug = strtolower(str_replace($charsOk, '-', $this->request->data->name));
				}
				$this->Category->save($this->request->data);
				$this->Session->setFlash('La catégorie a bien été modifié'); 
				$this->redirect('admin/categories/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error'); 
			}
			
		}elseif($id){
			$this->request->data = $this->Category->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$d['id'] = $id; 
		$this->set($d);
	}

	/**
	* Permet de supprimer un article
	**/
	function admin_delete($id){
		$this->loadModel('Category');
		$this->Category->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé'); 
		$this->redirect('admin/categories/index'); 
	}

	/**
	* Permet de lister les contenus
	**/
	function admin_tinymce(){
		$this->loadModel('Category');
		$this->layout = 'modal'; 
		$d['Categorys'] = $this->Category->find();
		$this->set($d);
	}


}