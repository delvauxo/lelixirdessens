<?php 


//fonction pour récupérer le nom de domaine du site
function url_actuelle()
{
  $domain = "http://" . $_SERVER["SERVER_NAME"];
  return $domain;
}

// Multi-langue FR / EN
function multi() {
      
// Création d'un vecteur de lien contenant les liens hypertextes de chaque page du site.
$linksFr = array(
   array("fr"=>BASE_URL . '/'           , "en"=>'/en/'),
   array("fr"=>BASE_URL . '/carte'      , "en"=>'/en/menu'),
   array("fr"=>BASE_URL . '/lunch'      , "en"=>'/en/lunch'),
   // array("fr"=>BASE_URL . '/menus'      , "en"=>'/en/gmenu'),
   array("fr"=>BASE_URL . '/photos'     , "en"=>'/en/gallery'),
   array("fr"=>BASE_URL . '/reservation', "en"=>'/en/booking'),
   array("fr"=>BASE_URL . '/contact'    , "en"=>'/en/contact'));


// Boucle de création de la liste des liens de chaque page du site Web.
foreach ($linksFr as $val) {
  // Vérification si la page X est la page en cours
  if ($_SERVER[SCRIPT_URL] == $val['fr']){
    // Si oui, alors remplacer le lien EN par le lien FR
    $string           =   $_SERVER[SCRIPT_URL];
    $patterns         =   '#'.$val['fr'].'#';
    $replacements     =   $val['en'];
    $ultra            =   preg_replace($patterns, $replacements, $string);

    $linkMulti       =   '<li class="multi multi-current';
    $linkMulti       .=   '"><a>';
    $linkMulti       .=   'FR';
    $linkMulti       .=   '</a></li>';

    $linkMulti       .=   '<li class="multi" onclick="JavaScript:document.location=';
    $linkMulti       .=   '\''.$ultra.'\'';
    $linkMulti       .=   '"><a>';
    $linkMulti       .=   'EN';
    $linkMulti       .=   '</a></li>';
    
    return $linkMulti;
    }
  }

}


//CREATION MENU AVEC OPTION CURRENT
function menu() {

// Création d'un vecteur de lien contenant les liens hypertextes de mon menu.
$items = array(
   array("link"=>BASE_URL . '/', "label"=>"Accueil"),
   array("link"=>BASE_URL . '/carte', "label"=>"La Carte"),
   array("link"=>BASE_URL . '/lunch', "label"=>"Lunch"),
   // array("link"=>BASE_URL . '/menus', "label"=>"Menus"),
   array("link"=>BASE_URL . '/photos', "label"=>"Photos"),
   array("link"=>BASE_URL . '/reservation', "label"=>"R&eacute;servation"),
   array("link"=>BASE_URL . '/contact', "label"=>"Contact"));

$menu = '';

// Boucle de création de la liste <ul><li> de mon menu.
foreach ($items as $val) {
   $menu .= '<li>';
   $menu .= '<a href="' . url_actuelle() . $val['link'].'"';
   // element a
   // Vérification si la page X est la page en cours
   // Si oui ajouter la classe « current » à l'élément de la liste
   if ($_SERVER['REQUEST_URI'] == $val['link'])
       $menu .= ' class="current"';
       $menu .= '>'.$val['label'].'</a></li>';
}

return $menu;

}


//CREATION MENU AVEC OPTION CURRENT
function menuFooter() {

// Création d'un vecteur de lien contenant les liens hypertextes de mon menu.
$items = array(
   array("link"=>BASE_URL . '/', "label"=>"Accueil"),
   array("link"=>BASE_URL . '/carte', "label"=>"La Carte"),
   array("link"=>BASE_URL . '/lunch', "label"=>"Lunch"),
   // array("link"=>BASE_URL . '/menus', "label"=>"Menus"),
   array("link"=>BASE_URL . '/photos', "label"=>"Photos"),
   array("link"=>BASE_URL . '/reservation', "label"=>"R&eacute;servation"),
   array("link"=>BASE_URL . '/contact', "label"=>"Contact"));

$menu = '';

// Boucle de création de la liste <ul><li> de mon menu.
foreach ($items as $val) {
   $menu .= '<li>';
   $menu .= '<a href="' . url_actuelle() . $val['link'].'"';
   // element a
   // Vérification si la page X est la page en cours
   // Si oui ajouter la classe « current » à l'élément de la liste
   $menu .= '>'.$val['label'].'</a></li>';
}

return $menu;

}


function debug($var){

	if(Conf::$debug>0){
		$debug = debug_backtrace(); 
		echo '<p>&nbsp;</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].' </strong> l.'.$debug[0]['line'].'</a></p>'; 
		echo '<ol style="display:none;">'; 
		foreach($debug as $k=>$v){ if($k>0){
			echo '<li><strong>'.$v['file'].' </strong> l.'.$v['line'].'</li>'; 
		}}
		echo '</ol>'; 
		echo '<pre>';
		print_r($var);
		echo '</pre>'; 
	}
	
}

//fonction pour re ecrire les url
function OptimiseUrl($chaine)
{    
    $chaine=strtolower($chaine);
 
    $accents = Array("/é/", "/è/", "/ê/","/ë/", "/ç/", "/à/", "/â/","/á/","/ä/","/ã/",
"/å/", "/î/", "/ï/", "/í/", "/ì/", "/ù/", "/ô/", "/ò/", "/ó/", "/ö/");
    $sans = Array("e", "e", "e", "e", "c", "a", "a","a", "a","a", "a", "i", "i", "i", 
"i", "u", "o", "o", "o", "o");
 
    $chaine = preg_replace($accents, $sans,$chaine);  
    $chaine = preg_replace('#[^A-Za-z0-9]#','-',$chaine);
 
   // Remplace les tirets multiples par un tiret unique
   $chaine = preg_replace( '/\-+/', '-', $chaine );
   // Supprime le dernier caractère si c'est un tiret
   $chaine = rtrim( $chaine, '-' );
 
    while (strpos($chaine,'--') !== false) $chaine = str_replace('--','-',$chaine);
 
    return $chaine; 
}


