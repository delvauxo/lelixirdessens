<?php 
class MediasController extends Controller{
	
	function admin_index($id){
		$this->loadModel('Media');
		if($this->request->data && !empty($_FILES['file']['name'])){
			if(strpos($_FILES['file']['type'], 'image') !== false){
				$dir = WEBROOT.DS.'img'.DS.$id;
				if(!file_exists($dir)) mkdir($dir,0777); 
				move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$_FILES['file']['name']);

				// Permet de récupérer l'id qui se trouve dans la barre d'adresse URL
				$id4MiniFromUrl =  array_reverse(explode('/', $dir)) ;

				copy($dir.DS.$_FILES['file']['name'], '/homez.374/microweb/www/nl/webroot/img/'.$id4MiniFromUrl[0].DS.$_FILES['file']['name']); // NL
				
				$this->Media->save(array(
					'name' => $this->request->data->name,
					'file' => $id.'/'.$_FILES['file']['name'],
					'post_id' => $id,
					'type' => 'img'
				));
				$this->Session->setFlash("L'image a bien été uploadé");
			}else{
				$this->Form->errors['file'] = "Le fichier n'est pas une image";
			}
		}
		$this->layout = 'modal';
		$d['images'] = $this->Media->find(array(
			'conditions' => array('post_id' => $id
		))); 
		$d['post_id'] = $id;
		$this->set($d); 
	}

	function admin_delete($id){
		$this->loadModel('Media');
		$media = $this->Media->findFirst(array(
			'conditions' => array('id'=>$id)
		));
		$nomFile = explode('/', $media->file);
		// Suppression des fichiers
		unlink(WEBROOT.DS.'img'.DS.$media->file);
		unlink('/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.$media->file); // NL
		//Suppression des fichiers thumbs
		unlink('/homez.374/microweb/www/fr/webroot'.DS.'img'.DS.$nomFile[0].DS.'thumbs'.DS.$nomFile[1]); // FR
		unlink('/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.$nomFile[0].DS.'thumbs'.DS.$nomFile[1]); // NL
		$this->Media->delete($id);
		$this->Session->setFlash("Le média a bien été supprimé");
		$this->redirect('admin/medias/index/'.$media->post_id);
	}

}