<?php 
class LunchController extends Controller{
  

  /**
  * Permet d'obtenir la methode lunch du controller posts
  **/

  function lunch(){
    $this->loadModel('Lunch');
    $condition  = array('online' => 1); 
    $d['lunch'] = $this->Lunch->find(array(
      'conditions' => $condition,
      'fields'     => 'Lunch.id,Lunch.titre,Lunch.titre_en,Lunch.file,Lunch.date,Lunch.created,Lunch.online',
      'order'    => 'id ASC',
    ));     

    $this->loadModel('Parametre');
    $d['parametres'] = $this->Parametre->find(array(
      'fields'     => 'Parametre.id,Parametre.title_for_layout_fr,Parametre.description_for_layout_fr',
      'order'    => 'id ASC',
    ));     

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

    $this->loadModel('Lunch');
    $condition  = array('online' => 1); 
    $d['posts'] = $this->Lunch->find(array(
      'conditions'  => $condition,
      'fields'     => 'Lunch.id,Lunch.titre,Lunch.titre_en,Lunch.file,Lunch.date,Lunch.created,Lunch.online',
      'order'    => 'id ASC',
    ));

    $this->set($d);
  }


  /**
  * Permet d'éditer un article
  **/
  function admin_edit($id = null){
    $this->loadModel('Lunch'); 
    if($id === null){
      $post = $this->Lunch->findFirst(array(
        'conditions' => array('online' => -1),
      ));
      if(!empty($post)){
        $id = $post->id;
      }else{
        $this->Lunch->save(array(
          'online' => -1,
          'created'    => date('Y-m-d')
        ));
        $id = $this->Lunch->id;
      }
    }else{
      $info = $this->Lunch->findFirst(array(
        'conditions'  =>  'id='.$id
        ));
        $this->set('post', $info);  
    }
    $d['id'] = $id; 
    if($this->request->data){
      if($this->Lunch->validates($this->request->data)) {
        if(!empty($_FILES['file']['name'])){
          if(strpos($_FILES['file']['type'], 'application/pdf') !== false) {

            $dir = WEBROOT.DS.'pdf';
            if(!file_exists($dir)) mkdir($dir,0777); 
            
            $goodName = str_replace ( ' ', '_', $_FILES['file']['name']);

            // Deplace le fichier original FR
            move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$goodName);

            // Copy du fichier pour la version EN
            $nlName = str_replace ( '/fr/', '/nl/', $dir);
            if(!file_exists($nlName)) mkdir($nlName,0777); 
            copy($dir.DS.$goodName, $nlName.DS.$goodName); // EN
            $this->request->data->file = $goodName;
          }
          $this->request->data->date = date('Y-m-d');
          $this->Lunch->save($this->request->data);
          $this->Session->setFlash('Le contenu a bien été enregistré'); 
          $this->redirect('admin/lunch/index'); 
        }else{
          $this->request->data->date = date('Y-m-d');
          $this->Lunch->save($this->request->data);
          $this->Session->setFlash('Le contenu a bien été enregistré'); 
          $this->redirect('admin/lunch/index'); 
        }
      }else{
        $this->Session->setFlash('Les données que vous avez introduites comportent une erreur !','error');
      }
      
    }else{
      $this->request->data = $this->Lunch->findFirst(array(
        'conditions' => array('id'=>$id)
      ));
    }
    $this->set($d);
  }

  /**
  * Permet de supprimer un article
  **/
  function admin_delete($id){
    $this->loadModel('Lunch');
    $this->Lunch->delete($id);
    $this->Session->setFlash('Le contenu a bien été supprimé.'); 
    $this->redirect('admin/lunch/index'); 
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