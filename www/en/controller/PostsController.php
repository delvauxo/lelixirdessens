<?php 

class PostsController extends Controller{

	

	/**

	* Blog, liste les articles

	**/

	function index(){

		$perPage = 6; 

		$this->loadModel('Post');

		$condition = array('online' => 1,'type'=>'post'); 

		$conditionforslides = array('online' => 1); 

		$d['posts'] = $this->Post->find(array(

			'conditions'	=> $condition,

			'fields'		=> 'Post.id,Post.name,Post.file,Post.slug,Post.created,Category.name as catname,Post.content,Category.slug as catslug',

			'order'		=> 'created ASC',

			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage,

			'join'		=> array('categories as Category'=>'Category.id=Post.category_id')

		));

		$d['total'] = $this->Post->findCount($condition); 

		$d['page'] = ceil($d['total'] / $perPage);

		$this->loadModel('Slide');

		$d['slides'] = $this->Slide->find(array(

			'conditions'	=> $conditionforslides,

			'fields'		=> 'id,online,file,file_tmb,linkedto,caption',

			'order'		=> 'id ASC'

		));

		$this->loadModel('Portfolio');

		$condition = array('online' => 1); 

		$d['portfolio'] = $this->Portfolio->find(array(

			'conditions'	=> $condition,

			'fields'		=> 'Portfolio.id,Portfolio.online,Portfolio.created,Portfolio.titre_fr,Portfolio.titre_en,Portfolio.texte_fr,Portfolio.texte_en,Portfolio.caption_fr,Portfolio.caption_en,Portfolio.file',

			'order'		=> 'id ASC',

			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage

		));		

		$this->loadModel('Citation');

		$d['citation'] = $this->Citation->find(array(

			'fields'     => 'Citation.id,Citation.text,Citation.text_en',

			'order' 	 => 'id DESC',

		));

		$this->loadModel('Sixe');

		$condition = array('online' => 1); 

		$d['sixe'] = $this->Sixe->find(array(

			'conditions'	=> $condition,

			'fields'     => 'Sixe.id,Sixe.texte_fr,Sixe.texte_en,Sixe.titre_fr,Sixe.titre_en,Sixe.prix,Sixe.online,Sixe.created',

			'order' 	 => 'prix ASC',

		));

		$this->loadModel('H_apropos');

		$d['h_apropos'] = $this->H_apropos->find(array(

			'fields'     => 'H_apropos.id,H_apropos.texte,H_apropos.titre,H_apropos.link',

			'order' 	 => 'id ASC',

		));		

		$this->loadModel('H_contact');

		$d['h_contact'] = $this->H_contact->find(array(

			'fields'     => 'H_contact.id,H_contact.texte,H_contact.titre,H_contact.link',

			'order' 	 => 'id ASC',

		));

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_fr,Parametre.description_for_layout_fr,Parametre.title_for_layout_en,Parametre.description_for_layout_en',

			'order' 	 => 'id ASC',

		));

		$this->set($d);

	}



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
      'fields'     => 'Parametre.id,Parametre.title_for_layout_en,Parametre.description_for_layout_en',
      'order'    => 'id ASC',
    ));     

    $this->layout = 'yaman';
    $this->set($d);
  }






	/**

	* Permet d'obtenir la methode carte du controller posts

	**/

	function menu(){

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

	* Permet d'obtenir la methode wines du controller posts

	**/

	function wines(){

		$perPage = 10; 

		$this->loadModel('Vins');

		$conditionSuggestion 	= array('online' => 1, 'type' => 1); 

		$conditionPatron 		= array('online' => 1, 'type' => 2); 

		$conditionRouge 		= array('online' => 1, 'type' => 3); 

		$conditionBlanc 		= array('online' => 1, 'type' => 4); 

		$conditionRose 			= array('online' => 1, 'type' => 5); 

		$conditionChampagne 	= array('online' => 1, 'type' => 6); 

		$d['suggestion'] = $this->Vins->find(array(

			'conditions'	=> $conditionSuggestion,

			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.verre,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.date,Vins.type,Vins.online',

			'order'			=> 'entier, nom ASC',

		));	

		$d['patron'] = $this->Vins->find(array(

			'conditions'	=> $conditionPatron,

			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.verre,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.date,Vins.type,Vins.online',

			'order'			=> 'entier, nom ASC',

		));	

		$d['rouge'] = $this->Vins->find(array(

			'conditions'	=> $conditionRouge,

			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.verre,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.date,Vins.type,Vins.online',

			'order'			=> 'entier, nom ASC',

		));	

		$d['blanc'] = $this->Vins->find(array(

			'conditions'	=> $conditionBlanc,

			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.verre,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.date,Vins.type,Vins.online',

			'order'			=> 'entier, nom ASC',

		));	

		$d['rose'] = $this->Vins->find(array(

			'conditions'	=> $conditionRose,

			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.verre,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.date,Vins.type,Vins.online',

			'order'			=> 'entier, nom ASC',

		));	

		$d['champagne'] = $this->Vins->find(array(

			'conditions'	=> $conditionChampagne,

			'fields'		=> 'Vins.id,Vins.nom,Vins.region,Vins.verre,Vins.quart,Vins.demi,Vins.entier,Vins.litre,Vins.date,Vins.type,Vins.online',

			'order'			=> 'entier, nom ASC',

		));	

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_fr,Parametre.description_for_layout_fr,Parametre.title_for_layout_en,Parametre.description_for_layout_en',

			'order' 	 => 'id ASC',

		));			

		$this->layout = 'front_home';

		$this->set($d);

	}



	/**
	* Permet d'obtenir la methode menus du controller posts
	**/

	function gmenu(){

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
			'fields'     => 'Parametre.id,Parametre.title_for_layout_en,Parametre.description_for_layout_en',
			'order' 	 => 'id ASC',
		));			

		$this->layout = 'yaman';

		$this->set($d);

		}


	/**

	* Permet d'obtenir la methode holidays du controller posts

	**/

	function holidays(){

		$this->loadModel('Fete');

		$conditionBoisson 		= array('online' => 1, 'type' => 1); 

		$conditionEntree 		= array('online' => 1, 'type' => 2); 

		$conditionPlat			= array('online' => 1, 'type' => 3); 

		$conditionDessert 		= array('online' => 1, 'type' => 4); 


		$d['boisson'] 		= $this->Fete->find(array(

			'conditions'	=> $conditionBoisson,

			'fields'		=> 'Fete.id,Fete.online,Fete.date,Fete.type,Fete.nom,Fete.nom_en,Fete.created',

			'order'			=> 'id',

		));	

		$d['entree'] 		= $this->Fete->find(array(

			'conditions'	=> $conditionEntree,

			'fields'		=> 'Fete.id,Fete.online,Fete.date,Fete.type,Fete.nom,Fete.nom_en,Fete.created',

			'order'			=> 'id',

		));	

		$d['plat'] 			= $this->Fete->find(array(

			'conditions'	=> $conditionPlat,

			'fields'		=> 'Fete.id,Fete.online,Fete.date,Fete.type,Fete.nom,Fete.nom_en,Fete.created',

			'order'			=> 'id',

		));	

		$d['dessert'] 		= $this->Fete->find(array(

			'conditions'	=> $conditionDessert,

			'fields'		=> 'Fete.id,Fete.online,Fete.date,Fete.type,Fete.nom,Fete.nom_en,Fete.created',

			'order'			=> 'id',

		));	


		$this->loadModel('Pri');

		$d['prix'] = $this->Pri->find(array(

			'fields'		=> 'Pri.id,Pri.online,Pri.date,Pri.created,Pri.prix_ss_dessert,Pri.prix_ss_entree,Pri.prix,Pri.nom,Pri.nom_en',

			'order' 	 	=> 'id',

		));			


		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_en,Parametre.description_for_layout_en',

			'order' 	 => 'id ASC',

		));			
		

		$this->layout = 'front_home';

		$this->set($d);

	}



	/**

	* Permet d'obtenir la methode gallery du controller posts

	**/

	/**

	* Permet d'obtenir la methode portfolio du controller posts

	**/

	function gallery(){

//		$perPage = 15; 

		$this->loadModel('Portfolio');

		$condition = array('online' => 1); 

		$d['portfolio'] = $this->Portfolio->find(array(

			'conditions'	=> $condition,

			'fields'		=> 'Portfolio.id,Portfolio.online,Portfolio.created,Portfolio.titre_fr,Portfolio.titre_en,Portfolio.texte_fr,Portfolio.texte_en,Portfolio.caption_fr,Portfolio.caption_en,Portfolio.file,Portfolio.file_full',

			'order'		=> 'id ASC',

//			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage

		));		

//		$d['total'] = $this->Portfolio->findCount($condition); 

//		$d['page'] = ceil($d['total'] / $perPage);	

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_en,Parametre.description_for_layout_en',

			'order' 	 => 'id ASC',

		));			

		$this->layout = 'yaman';

		$this->set($d);

	}


	/**

	* Permet d'obtenir la methode telecharge du controller posts

	**/

	function telecharge(){

		$this->loadModel('Catalogue');

		$d['catalogues'] = $this->Catalogue->find(array(

			'conditions'	=> $conditions,

			'fields'		=> 'id,online,name,file,category_id',

			'order'		=> 'id ASC'

		));		

		$this->layout = 'front_home';

		$this->set($d);

	}



	/**

	* Permet d'obtenir la methode reservation du controller posts

	**/

	function booking(){

		$this->loadModel('Reservation');

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_en,Parametre.description_for_layout_en',

			'order' 	 => 'id ASC',

		));			

		$this->layout = 'yaman';

		$this->set($d);

	}	



	/**

	* Permet d'obtenir la methode Qui_sommes_nous du controller posts

	**/

	function propos_nl(){

		$this->loadModel('About');

		$d['about'] = $this->About->find(array(

			'fields'     => 'About.id,About.online,About.description_nl'

		));		

		$this->layout = 'front_home';

		$this->set($d);

	}



	/**

	* Permet d'obtenir la methode contact du controller posts

	**/

	function contact(){

		$this->loadModel('Post');

		$this->loadModel('Parametre');

		$d['parametres'] = $this->Parametre->find(array(

			'fields'     => 'Parametre.id,Parametre.title_for_layout_en,Parametre.description_for_layout_en',

			'order' 	 => 'id ASC',

		));			

		$this->layout = 'yaman';

		$this->set($d);

	}	




	/**

	* Permet d'obtenir la methode mail du controller posts

	**/

	function mail(){

		$this->loadModel('Post');

		$this->layout = 'front_home';

		$this->set($d);

	}



	/**

	* Permet d'obtenir la methode mail du controller posts

	**/

	function mail2(){

		$this->loadModel('Post');

		$this->layout = 'yaman';

		$this->set($d);

	}



	/**

	* Permet d'obtenir la methode mail du controller posts

	**/

	function mailReservation(){

		$this->loadModel('Post');

		$this->layout = 'yaman';

		$this->set($d);

	}



	/**

	* Permet d'obtenir la methode FormMail du controller posts

	**/

	function FormMail(){

		$this->loadModel('Post');

		$this->layout = 'front_home';

		$this->set($d);

	}









	/**

	* Permet d'obtenir la methode after_mail du controller posts

	**/

	function after_mail(){

		$this->loadModel('Post');

		$this->layout = 'front_home';

		$this->set($d);

	}



	/**

	* Permet d'afficher les posts d'une catégorie

	**/

	function category($slug){

		$this->loadModel('Category'); 

		$category = $this->Category->findFirst(array(

			'conditions'	=> array('slug' => $slug),

			'fields'		=> 'id,name'

		));

		if(empty($category)){

			$this->e404();

		}

		$perPage = 10; 

		$this->loadModel('Post');

		$condition = array('online' => 1,'type'=>'post','category_id' => $category->id); 

		$d['posts'] = $this->Post->find(array(

			'conditions'	=> $condition,

			'fields'		=> 'Post.id,Post.name,Post.file,Post.slug,Post.created,Category.name as catname,Post.content,Category.slug as catslug',

			'order'		=> 'created DESC',

			'limit'		=> ($perPage*($this->request->page-1)).','.$perPage,

			'join'		=> array('categories as Category'=>'Category.id=Post.category_id')

		));

		$d['total'] = $this->Post->findCount($condition); 

		$d['page'] = ceil($d['total'] / $perPage);

		$d['title'] = 'Tous les articles "'.$category->name.'"'; 

		$this->loadModel('Slide');

		$d['slides'] = $this->Slide->find(array(

			'conditions'	=> $conditions,

			'fields'		=> 'id,online,file,linkedto,caption',

			'order'		=> 'id ASC'

		));		



		// On veut un sélecteur de catégorie donc on récup la liste des catégories

		$this->loadModel('Category');

		$d['categories'] = $this->Category->findList(); 

		$d['catslug'] = $this->Category->findList2(); 



		$this->set($d);

		// Le système est le même que la page index alors on rend la vue Index

		$this->render('actualite'); 

	}



	/**

	* Affiche un article en particulier

	**/

	function view($id,$slug){

		$this->loadModel('Post');

		$d['post']  = $this->Post->findFirst(array(

			'fields'			=> 'Post.id,Post.name,Post.content,Post.file,Post.slug,Post.created,Category.name as catname,Category.slug as catslug',

			'conditions'		=> array('Post.online' => 1,'Post.id'=>$id,'Post.type'=>'post'),

			'join'			=> array('categories as Category'=>'Category.id=Post.category_id')

		)); 

		if(empty($d['post'])){

			$this->e404('Page introuvable'); 

		}

		if($slug != $d['post']->slug){

			$this->redirect("posts/view/id:$id/slug:".$d['post']->slug,301);

		}?>



		<!-- FONCTION : Création des photos miniatures

		================================================ --> 

		<?php

		function creerMiniature($repertoire, $image, $taille = 100){

			$tmp_taille = getimagesize($repertoire.$image);



			// Extensions



			// Je crée un array dans lequel figurent seulement les extensions acceptées, avec le type MIME qui leur est associé (qui peut varier sous IE et qu'on va donc devoir différencier) :

			$ListeMiniExtension		= array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');

			$ListeMiniExtensionIE	= array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Il fallait une nouvelle fois qu'IE se différencie.



			// Je vérifie l'extension présumée du fichier :

			$ExtensionPresumee	= explode('.', $image);

			$ExtensionPresumee	= strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);

			if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg' || $ExtensionPresumee == 'pjpg' || $ExtensionPresumee == 'pjpeg' || $ExtensionPresumee == 'gif' || $ExtensionPresumee == 'png')

			{

				// ImageCreateFrom... select

				switch ( $ExtensionPresumee ) {

					//pour le cas où l'extension est "jpeg"

					case "jpg":

					case "jpeg": 

					case "pjpg": // IE

					case "pjpeg": // IE

					$tmp = imagecreatefromjpeg($repertoire.$image);

					break;



					// Fichiers GIF

					case "gif":

					$tmp = imagecreatefromgif($repertoire.$image);

					break;



					// Fichiers PNG

					case "png":

					$tmp = imagecreatefrompng($repertoire.$image);

					break;



					// On peut également ouvrir les formats wbmp, xbm et xpm (vérifier la configuration du serveur)



					default:

					echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";

					break;

				}

			}



			$format = true;

			if($tmp_taille[0] >= $tmp_taille[1]){

				$dimention = $tmp_taille[1];

			}

			else if($tmp_taille[0] <= $tmp_taille[1]){

				$dimention = $tmp_taille[0];

				$format = false;

			}

			else{

				$dimention = $tmp_taille[0];

			}

			if($format){

				$pos_x = ($tmp_taille[0] / 2) - ($dimention / 2);

				$pos_y = 0;

			}

			else{

				$pos_y = ($tmp_taille[1] / 2) - ($dimention / 2);

				$pos_x = 0;

			}

			$thumb = imagecreatetruecolor($taille, $taille);

			imagecopyresampled($thumb, $tmp, 0, 0, $pos_x, $pos_y, $taille, $taille, $dimention, $dimention);

			imagedestroy($tmp);



			// Permet de récupérer l'id de l'url pour pouvoir copier les miniatures en plusieurs langues...

			$id4MiniPics =  array_reverse(explode('-', $_SERVER[SCRIPT_URL]));



			// Enregistrement de l'image d'origine & redimmensionée -> Image... select

			switch ( $ExtensionPresumee ) {

				//pour le cas où l'extension est "jpeg"

				case "jpg":

				case "jpeg": 

				case "pjpg": // IE

				case "pjpeg": // IE

				// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité !

				imagejpeg($thumb, $repertoire."thumbs/".$image, 100); // FR

				imagejpeg($thumb, "/homez.374/microweb/www/nl/webroot/img/".$id4MiniPics[0].DS.'thumbs'.DS.$image, 100); // NL

				break;



				// Fichiers GIF

				case "gif":

				// Pour enregistrer au format gif [miniature]

				imagegif($thumb, $repertoire."thumbs/".$image); // pas de qualité à spécifier FR

				imagegif($thumb, "/homez.374/microweb/www/nl/webroot/img/".$id4MiniPics[0].DS.'thumbs'.DS.$image); // pas de qualité à spécifier NL

				break;



				// Fichiers PNG

				case "png":

				// Pour enregistrer au format png [miniature]

				imagepng($thumb, $repertoire."thumbs/".$image, 9); // qualité de 0 à 9 pour les PNG FR

				imagepng($thumb, "/homez.374/microweb/www/nl/webroot/img/".$id4MiniPics[0].DS.'thumbs'.DS.$image, 9); // qualité de 0 à 9 pour les PNG NL

				break;



				// On peut également enregistrer les formats wbmp, xbm et xpm (vérifier la configuration du serveur)



				default:

				echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";

				break;

			}





			imagedestroy($thumb);

		}

		?>



		<!-- FONCTION : Affichage des photos miniatures en colonnes

		================================================= --> 

		<?php

		function afficherImages($repertoire, $taille = 100, $colonnes = 3){

			$dossier = opendir($repertoire);

			$top = 0;

			echo "<table style='border: 0px solid green;margin-left: 9px; margin-top: 10px; width: 100px;'><tr>";

			$i = 0;

			while($fichier = readdir($dossier)){

				$extension = strrchr($fichier, '.');

				$extensions = array(".jpg", ".JPG", ".jpeg", ".JPG", ".png", ".PNG", ".gif", ".GIF");

				if(in_array($extension, $extensions)){

					$i++;

					creerMiniature($repertoire, $fichier);

					echo "<td style='border: 0px solid blue;'><a href='".$repertoire.$fichier."' class='zoombox zgallery1'>";

					echo "<img class='rounded-shadow' style='padding: 1px;' src='".$repertoire."thumbs/".$fichier."'/></a></td>";

					if($i >= $colonnes){

						echo "</tr><tr>";

						$i = 0;

					}

				}

			}

			echo "</tr></table>";

		}		

		$this->layout = 'front_home';

		$this->set($d);

	}

	

	/**

	* ADMIN  ACTIONS

	**/

	/**

	* Liste les différents articles

	**/

	function admin_index(){

		$perPage = 10; 

		$this->loadModel('Post');

		$condition = array('type'=>'post'); 

		$d['posts'] = $this->Post->find(array(

			'fields'			=> 'Post.id,Post.name,Post.file,Post.online,Category.name as catname,Category.slug as catslug,Post.created,Post.date',

			'order'			=> 'id ASC',

			'conditions'		=> $condition,

			'limit'			=> ($perPage*($this->request->page-1)).','.$perPage,

			'join'			=> array('categories as Category'=>'Category.id=Post.category_id')

		));

		$d['total'] = $this->Post->findCount($condition); 

		$d['page'] = ceil($d['total'] / $perPage);

		$this->set($d);

	}





	/**

	* Affiche la page de bienvenue...

	**/

	function admin_welcome(){

		$this->loadModel('Post');

		$this->set($d);

	}	



	/**

	* Affiche la page d'aide...

	**/

	function admin_aide(){

		$this->loadModel('Post');

		$this->set($d);

	}	



	/**

	* Affiche la page du contenu...

	**/

	function admin_contenu(){

		$this->set($d);

	}	



	/**

	* Affiche la page du contenu...

	**/

	function admin_menus(){

		$this->set($d);

	}	



	/**

	* Affiche la page d'actualite...

	**/

	function admin_actualite(){

		$this->set($d);

	}	



	/**

	* Affiche la page home...

	**/

	function admin_home(){

		$this->set($d);

	}	



	/**

	* Affiche la page des statistiques Google...

	**/

	function admin_analytics(){

		$this->loadModel('Analytic');

		$d['analytics'] = $this->Analytic->find(array(

			'fields'		=>	'Analytic.id,Analytic.login,Analytic.password,Analytic.lien_fr,Analytic.lien_nl',

			'order'			=>	'id DESC'

		));

		$this->set($d);

	}	



	/**

	* Permet d'éditer un article

	**/

	function admin_edit($id = null){

		$this->loadModel('Post'); 

		if($id === null){

			$post = $this->Post->findFirst(array(

				'conditions' => array('online' => -1),

			));

			if(!empty($post)){

				$id = $post->id;

			}else{

				$this->Post->save(array(

					'online' => -1,

					'created' 	 => date('Y-m-d')

				));

				$id = $this->Post->id;

			} 



		}else{

			$info = $this->Post->findFirst(array(

				'conditions'	=>	'id='.$id

				));

				$this->set('post', $info);	

		}

			$d['id'] = $id;

		$this->loadModel('Media');

		$d['images'] = $this->Media->find(array(

			'conditions' => array('post_id' => $id

		)));



		if($this->request->data){

			if ($this->Post->validates($this->request->data)) {

				if(!empty($_FILES['file']['name'])){

					// Je vérifie qu'il s'agit bien d'un fichier de type 'image'...

					if(strpos($_FILES['file']['type'], 'image') !== false){

						// Je vérifie si le fichier ne dépasse pas les 2 Mo...

						if ($_FILES['file']['size'] <= 2097152){ 



							// Création de la variable $ImageNews

							$ImageNews = $_FILES['file']['name'];



							// Je crée un array dans lequel figurent seulement les extensions acceptées, avec le type MIME qui leur est associé (qui peut varier sous IE et qu'on va donc devoir différencier) :

							$ListeExtension		= array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');

							$ListeExtensionIE	= array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Il fallait une nouvelle fois qu'IE se différencie.



							// Je vérifie l'extension présumée du fichier :

							$ExtensionPresumee	= explode('.', $ImageNews);

							$ExtensionPresumee	= strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);

							if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg' || $ExtensionPresumee == 'pjpg' || $ExtensionPresumee == 'pjpeg' || $ExtensionPresumee == 'gif' || $ExtensionPresumee == 'png')

							{

								// Je vérifie que le type MIME de l'image que j'ai choisie correspond bien à son extension

								$ImageNews = getimagesize($_FILES['file']['tmp_name']);

								if($ImageNews['mime'] == $ListeExtension[$ExtensionPresumee]  || $ImageNews['mime'] == $ListeExtensionIE[$ExtensionPresumee])

								{

									

									// ImageCreateFrom... select

									switch ( $ExtensionPresumee ) {

										//pour le cas où l'extension est "jpeg"

										case "jpg":

										case "jpeg": 

										case "pjpg": // IE

										case "pjpeg": // IE

										$ImageChoisie = imagecreatefromjpeg( $_FILES['file']['tmp_name'] );

										break;



										// Fichiers GIF

										case "gif":

										$ImageChoisie = imagecreatefromgif( $_FILES['file']['tmp_name'] );

										break;



										// Fichiers PNG

										case "png":

										$ImageChoisie = imagecreatefrompng( $_FILES['file']['tmp_name'] );

										break;



										// On peut également ouvrir les formats wbmp, xbm et xpm (vérifier la configuration du serveur)



										default:

										echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";

										break;

									}



									// Je récupére les dimensions du fichier posté

									$TailleImageChoisie	= getimagesize($_FILES['file']['tmp_name']);

									

									// Je redimmensionne la nouvelle image

									// Étape 1 : La largeur

									$NouvelleLargeur = 600;

									// Étape 2 : Je calcule le pourcentage de réduction qui correspond au quotient de l'ancienne largeur par la nouvelle. Comme c'est un pourcentage, on multiplie le résultat par 100.

									$Reduction = ( ($NouvelleLargeur * 100)/$TailleImageChoisie[0] );

									// Étape 3 : Je détermine la hauteur de la nouvelle image en appliquant le pourcentage de réduction à l'ancienne hauteur.

									$NouvelleHauteur = ( ($TailleImageChoisie[1] * $Reduction)/100 );



									// Création de l'image 

									//Etape 1 :

									$NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");

									//Etape 2 :

									imagecopyresampled($NouvelleImage , $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);



									// Retrouver le nom de l'image en utilisant explode

									$NomImageChoisie = explode('.', $ImageNews);



									// Modifier le nom retrouvé pour sécuriser l'insertion

									$NomImageExploitable = time();



									// Chemin de destination pour la nouvelle image

									$dirFr = WEBROOT.DS.'img'.DS.$id.'/cover'; // FR

									$dirNl = '/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.$id.'/cover'; // NL



									// Si les dossiers "id" et "cover" n'existent pas, les créer !

									if(!file_exists(WEBROOT.DS.'img'.DS.$id)) mkdir(WEBROOT.DS.'img'.DS.$id, 0777); // FR

									if(!file_exists('/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.$id)) mkdir('/homez.374/microweb/www/nl/webroot'.DS.'img'.DS.$id, 0777); // NL

									if(!file_exists($dirFr)) mkdir($dirFr,0777); // FR

									if(!file_exists($dirNl)) mkdir($dirNl,0777); // NL



									// Enregistrement de l'image d'origine & redimmensionée -> Image... select

									switch ( $ExtensionPresumee ) {

										//pour le cas où l'extension est "jpeg"

										case "jpg":

										case "jpeg": 

										case "pjpg": // IE

										case "pjpeg": // IE

										// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité !

										imagejpeg($NouvelleImage , '/homez.374/microweb/www/nl/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);



										// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité !

										imagejpeg($NouvelleImage , '/homez.374/microweb/www/fr/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);



										//Enregistrement de l'image aux dimensions d'origine :

										imagejpeg($ImageChoisie ,  '/homez.374/microweb/www/nl/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 100);



										//Enregistrement de l'image aux dimensions d'origine :

										imagejpeg($ImageChoisie , '/homez.374/microweb/www/fr/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 100);

										break;



										// Fichiers GIF

										case "gif":

										// Pour enregistrer au format gif [redimensionée] GIF

										imagegif($NouvelleImage , '/homez.374/microweb/www/nl/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee);



										// Pour enregistrer au format gif [redimensionée] GIF

										imagegif($NouvelleImage , '/homez.374/microweb/www/fr/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee);



										//Enregistrement de l'image aux dimensions d'origine : GIF

										imagegif($ImageChoisie ,  '/homez.374/microweb/www/nl/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee);



										//Enregistrement de l'image aux dimensions d'origine : GIF

										imagegif($ImageChoisie , '/homez.374/microweb/www/fr/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee);

										break;



										// Fichiers PNG

										case "png":

										// Pour enregistrer au format gif [redimensionée] PNG

										imagepng($NouvelleImage , '/homez.374/microweb/www/nl/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG



										// Pour enregistrer au format gif [redimensionée] PNG

										imagepng($NouvelleImage , '/homez.374/microweb/www/fr/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG



										//Enregistrement de l'image aux dimensions d'origine : PNG

										imagepng($ImageChoisie ,  '/homez.374/microweb/www/nl/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG



										//Enregistrement de l'image aux dimensions d'origine : PNG

										imagepng($ImageChoisie , '/homez.374/microweb/www/fr/webroot/img/'.$id.'/cover/'.$NomImageExploitable.'_FullImage.'.$ExtensionPresumee, 9); // qualité de 0 à 9 pour les PNG

										break;



										// On peut également enregistrer les formats wbmp, xbm et xpm (vérifier la configuration du serveur)



										default:

										echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";

										break;

									}



									// Je supprime l'image originale (facultatif)

									imagedestroy($ImageChoisie);



									// Déplacer si besoin le nouveau fichier

									// move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$_FILES['file']['name']);



									// Optimisation de l'url FR

									$titre_url_fr = OptimiseUrl($this->request->data->name);

									// Optimisation de l'url NL

									$titre_url_nl = OptimiseUrl($this->request->data->naam);





									// Enregistrement de l'url FR optimisée dans la database <-- SLUG FR 

									if (empty($this->request->data->slug)) {

										$this->request->data->slug = strtolower($titre_url_fr);

									}

									// Enregistrement de l'url NL optimisée dans la database <-- SLUG NL

									if (empty($this->request->data->slug_nl)) {

										$this->request->data->slug_nl = strtolower($titre_url_nl);

									}



									$this->request->data->file = $id.'/cover/'.$NomImageExploitable.'.'.$ExtensionPresumee;

									$this->request->data->type = 'post';

									$this->request->data->date = date("Y-m-d");

									$this->Post->save($this->request->data);

									$this->Session->setFlash('Le contenu a bien été modifié.'); 

									$this->redirect('admin/posts/index'); 

								}else{

									$this->Session->setFlash("Il ne s'agit pas d'un fichier de type image !");

								}

							}else{

								$this->Session->setFlash("L'extension choisie pour l'image est incorrecte");

							}

						}else{

							$this->Session->setFlash('Votre fichier image est trop volumineux (Max : 2Mo).'); 

						}

					}else{

						$this->Session->setFlash("Il ne s'agit pas d'un fichier de type image !");

					}

				}else{	// Si aucune image n'a été envoyé, enregistrer quand même le restant du contenu...



					// Optimisation de l'url FR

					$titre_url_fr = OptimiseUrl($this->request->data->name);

					// Optimisation de l'url NL

					$titre_url_nl = OptimiseUrl($this->request->data->naam);





					// Enregistrement de l'url FR optimisée dans la database <-- SLUG FR 

					if (empty($this->request->data->slug)) {

						$this->request->data->slug = strtolower($titre_url_fr);

					}

					// Enregistrement de l'url NL optimisée dans la database <-- SLUG NL

					if (empty($this->request->data->slug_nl)) {

						$this->request->data->slug_nl = strtolower($titre_url_nl);

					}

					$this->request->data->type = 'post';

					$this->request->data->date = date("Y-m-d");

					$this->Post->save($this->request->data);

					$this->Session->setFlash('Le contenu a bien été modifié.'); 

					$this->redirect('admin/posts/index'); 

				}

//				// Permet l'upload d'un document

//				if(!empty($_FILES['dossier']['name'])){

//					if(strpos($_FILES['dossier']['type'], 'pdf') !== false){

//						$dir = WEBROOT.DS.'img'.DS.$id.'/dossier';

//						if(!file_exists(WEBROOT.DS.'img'.DS.$id)) mkdir(WEBROOT.DS.'img'.DS.$id, 0777);

//						if(!file_exists($dir)) mkdir($dir, 0777);

//

//						move_uploaded_file($_FILES['dossier']['tmp_name'],$dir.DS.$_FILES['dossier']['name']);

//

//					}

//				$this->request->data->dossier = $id.'/dossier/'.$_FILES['dossier']['name'];

//				}				

			}

		}else{

			$this->request->data = $this->Post->findFirst(array(

				'conditions' => array('id'=>$id)

			));

		}



		// On veut un sélecteur de catégorie donc on récup la liste des catégories

		$this->loadModel('Category');

		$d['categories'] = $this->Category->findList(); 

		$this->set($d);

		?>



		<!-- FONCTION : Création des photos miniatures

		================================================ --> 

		<?php

		function creerMiniature($repertoire, $image, $taille = 100){

			$tmp_taille = getimagesize($repertoire.$image);



			// Extensions



			// Je crée un array dans lequel figurent seulement les extensions acceptées, avec le type MIME qui leur est associé (qui peut varier sous IE et qu'on va donc devoir différencier) :

			$ListeMiniExtension		= array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');			

			$ListeMiniExtensionIE	= array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg'); // Il fallait une nouvelle fois qu'IE se différencie.

			

			// Je vérifie l'extension présumée du fichier :

			$ExtensionPresumee		= explode('.', $image);

			$ExtensionPresumee		= strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);

			if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'jpeg' || $ExtensionPresumee == 'pjpg' || $ExtensionPresumee == 'pjpeg' || $ExtensionPresumee == 'gif' || $ExtensionPresumee == 'png')

			{

				// ImageCreateFrom... select

				switch ( $ExtensionPresumee ) {

					//pour le cas où l'extension est "jpeg"

					case "jpg":

					case "jpeg": 

					case "pjpg": // IE

					case "pjpeg": // IE

					$tmp = imagecreatefromjpeg($repertoire.$image);

					break;



					// Fichiers GIF

					case "gif":

					$tmp = imagecreatefromgif($repertoire.$image);

					break;



					// Fichiers PNG

					case "png":

					$tmp = imagecreatefrompng($repertoire.$image);

					break;



					// On peut également ouvrir les formats wbmp, xbm et xpm (vérifier la configuration du serveur)



					default:

					echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";

					break;

				}

			}



			$format = true;

			if($tmp_taille[0] >= $tmp_taille[1]){

				$dimention = $tmp_taille[1];

			}

			else if($tmp_taille[0] <= $tmp_taille[1]){

				$dimention = $tmp_taille[0];

				$format = false;

			}

			else{

				$dimention = $tmp_taille[0];

			}

			if($format){

				$pos_x = ($tmp_taille[0] / 2) - ($dimention / 2);

				$pos_y = 0;

			}

			else{

				$pos_y = ($tmp_taille[1] / 2) - ($dimention / 2);

				$pos_x = 0;

			}

			$thumb = imagecreatetruecolor($taille, $taille);

			imagecopyresampled($thumb, $tmp, 0, 0, $pos_x, $pos_y, $taille, $taille, $dimention, $dimention);

			imagedestroy($tmp);



			// Enregistrement de l'image d'origine & redimmensionée -> Image... select

			switch ( $ExtensionPresumee ) {

				//pour le cas où l'extension est "jpeg"

				case "jpg":

				case "jpeg": 

				case "pjpg": // IE

				case "pjpeg": // IE

				// Finir en enregistrant l'image redimensionnée dans un dossier au choix, tout en choisissant sa qualité !

				imagejpeg($thumb, $repertoire."thumbs/".$image, 100);

				break;



				// Fichiers GIF

				case "gif":

				// Pour enregistrer au format gif [miniature]

				imagegif($thumb, $repertoire."thumbs/".$image); // pas de qualité à spécifier

				break;



				// Fichiers PNG

				case "png":

				// Pour enregistrer au format png [miniature]

				imagepng($thumb, $repertoire."thumbs/".$image, 9); // qualité de 0 à 9 pour les PNG

				break;



				// On peut également enregistrer les formats wbmp, xbm et xpm (vérifier la configuration du serveur)



				default:

				echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";

				break;

			}



			imagedestroy($thumb);

		}

		?>

		<!-- FONCTION : Affichage des photos miniatures en colonnes

		================================================= --> 

		<?php

		function afficherImages($repertoire, $taille = 100, $colonnes = 3){

			$dossier = opendir($repertoire);

			$top = 0;

			echo "<table style='margin-top: 10px; width: 100px;'><tr>";

			$i = 0;

			while($fichier = readdir($dossier)){

				$extension = strrchr($fichier, '.');

				$extensions = array(".jpg", ".JPG", ".jpeg", ".JPG", ".png", ".PNG", ".gif", ".GIF");

				$idUrlMiniPics = explode('/', $repertoire); // Récuération de l'ID pour le link des miniatures (href, src)

				if(in_array($extension, $extensions)){

					$i++;

					creerMiniature($repertoire, $fichier);

					echo "<td style='border: 0px solid blue;'><a href='http://www.micro-web.be/fr/img/".$idUrlMiniPics[2]."/".$fichier."' class='zoombox zgallery1'>";

					echo "<img style='margin: 5px; padding: 3.5px; border: 2px solid #e8eae9;' src='http://www.micro-web.be/fr/img/".$idUrlMiniPics[2]."/thumbs/".$fichier."'/></a></td>";

					if($i >= $colonnes){

						echo "</tr><tr>";

						$i = 0;

					}

				}

			}

			echo "</tr></table>";

		}	

	}



	/**

	* Permet de supprimer un article

	**/

	function admin_delete($id){

		$this->loadModel('Post');

		$this->Post->delete($id);

		$this->Session->setFlash('Le contenu a bien été supprimé.'); 

		$this->redirect('admin/posts/index'); 

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