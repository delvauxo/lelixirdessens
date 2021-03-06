<!DOCTYPE html>

<html>

    <head> 

    <title><?php echo isset($title_for_layout)?$title_for_layout:'Poivre et Sel - Galerie Photos'; ?></title> 

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 

    <meta name="description" content="<?php echo isset($description_for_layout)?$description_for_layout:"C’est au coin de la rue du Parnasse à Ixelles que le jeune chef talentueux Nicola Colucci s’est installé aux fourneaux du Poivre & Sel."; ?>">



    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />



    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/960.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/demo.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/font.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/reset.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/style.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/flaticon.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('zoombox/zoombox.css'); ?>" type="text/css" media="screen" /> 

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,800' rel='stylesheet' type='text/css'>



    <style type="text/css">

    /* Font FlatIcon Generated by Font Squirrel */

    @font-face {

        font-family: 'Flaticon';

        src: url('<?php echo Router::webroot('font/flaticon.eot'); ?>');

        src: url('<?php echo Router::webroot('font/flaticon.eot#iefix'); ?>') format('embedded-opentype'),

             url('<?php echo Router::webroot('font/flaticon.woff'); ?>') format('woff'),

             url('<?php echo Router::webroot('font/flaticon.ttf'); ?>') format('truetype'),

             url('<?php echo Router::webroot('font/flaticon.svg'); ?>') format('svg');

        font-weight: normal;

        font-style: normal;

    }



    [class^="flaticon-"]:before, [class*=" flaticon-"]:before,

    [class^="flaticon-"]:after, [class*=" flaticon-"]:after {   

      font-family: Flaticon;

      font-style: normal;

    }

    </style>



    <script type="text/javascript">

    jQuery(function($){

      $('a.zoombox').zoombox();

    });

    </script> 



    </head>



    <body>



<!-- Google Analytics to place juste after the body opening tag--> 

    <?php include_once(CORE.DS."Analyticstracking.php") ?>



<div id="bigheader">

  <div class="container_12">



<!-- LOGO -->

    <div class="grid_10 prefix_1 suffix_1" id="logo">

      <img src="<?php echo Router::webroot('/img/layout/microweb/logo_new.png'); ?>">

    </div>



<!-- MULTILINGUE -->

    <?php 

    // Création d'un vecteur de lien contenant les liens hypertextes de chaque page du site.

    $linksFr = array(

       array("fr"=>"/fr/", "en"=>"/en/"),
       array("fr"=>"/fr/carte", "en"=>"/en/menu"),
       array("fr"=>"/fr/menus", "en"=>"/en/gmenu"),
       array("fr"=>"/fr/fetes", "en"=>"/en/holidays"),
       array("fr"=>"/fr/vins", "en"=>"/en/wines"),
       array("fr"=>"/fr/portfolio", "en"=>"/en/gallery"),
       array("fr"=>"/fr/reservation", "en"=>"/en/booking"),
       array("fr"=>"/fr/contact", "en"=>"/en/contact"));

    // Boucle de création de la liste des liens de chaque page du site Web.

    foreach ($linksFr as $val) {

       // Vérification si la page X est la page en cours

       if ($_SERVER[SCRIPT_URL] == $val['fr']){

      // Si oui, alors remplacer le lien EN par le lien FR

      $string           =   $_SERVER[SCRIPT_URL];
      $patterns         =   '#'.$val['fr'].'#';
      $replacements     =   $val['en'];
      $ultra            =   preg_replace($patterns, $replacements, $string);

      $linkMulti        =   '<div class="grid_4 prefix_4 suffix_4" id="multi">';

      $linkMulti       .=   '<div class="choice';
      $linkMulti       .=   ' current';
      $linkMulti       .=   '">';
      $linkMulti       .=   'FR';
      $linkMulti       .=   '</div>';

      $linkMulti       .=   '<div onclick="JavaScript:document.location=';
      $linkMulti       .=   '\''.$ultra.'\'';
      $linkMulti       .=   '" class="choice">';
      $linkMulti       .=   'EN';
      $linkMulti       .=   '</div>';
      
      $linkMulti       .=   '</div>';

      echo $linkMulti;

      }

    }
    ?>


  </div>

</div>



<div id="bigbody">

<div class="container_12">



<!-- NAVIGATION -->

    <?php 

    // Création d'un vecteur de lien contenant les liens hypertextes de mon menu.

    $items = array(

       array("link"=>"/fr/", "label"=>"Accueil"),

       array("link"=>"/fr/carte", "label"=>"Carte"),

       array("link"=>"/fr/menus", "label"=>"Menu de Groupe"),

       // MENU POUR LE PORTFOLIO 

       // ======================================================

       // array("link"=>"/fr/portfolio", "label"=>"Portfolio"),

       // ======================================================

       array("link"=>"/fr/fetes", "label"=>"Pour les Fêtes"),

       array("link"=>"/fr/vins", "label"=>"Vins"),

       array("link"=>"/fr/portfolio", "label"=>"Galerie"),

       array("link"=>"/fr/reservation", "label"=>"R&eacute;servation"),

       array("link"=>"/fr/contact", "label"=>"Contact"));



    $menu = '';



    // Boucle de création de la liste <ul><li> de mon menu.

    foreach ($items as $val) {

       $menu .= '<li';

       // element li

       // Vérification si la page X est la page en cours

       // Si oui ajouter la classe « current » à l'élément de la liste

       if ($_SERVER['REQUEST_URI'] == $val['link'])

           $menu .= ' class="current"';

       $menu .= '><a href="http://www.poivre-et-sel.be'.$val['link'].'"';

       // element a

       // Vérification si la page X est la page en cours

       // Si oui ajouter la classe « current » à l'élément de la liste

       if ($_SERVER['REQUEST_URI'] == $val['link'])

           $menu .= ' class="current"';

       $menu .= '>'.$val['label'].'</a></li>';

    }

    ?>        



    <div class="grid_12 allnav centrage">

      <!-- Menu -->

      <div class="nav">

            <ul> 

            <?php echo $menu;  ?>

          </ul>

      </div>

      <!-- end .grid_2 -->

    </div>





<!-- CONTENU -->

    <div class="clear"></div>

    <?php echo stripslashes($content_for_layout); ?>





    </div>    <?php // END CONTAINER_12 ?>



<!-- FOOTER -->

    <div id="bigfooter">

      <div class="container_12">

        <div class="grid_4">

          <div class="title"><img style="height: 35px; margin-top: -13px;" src="<?php echo Router::webroot('img/layout/microweb/logo_new_site_footer.png'); ?>" alt=""></div>

          <p>Agence spécialisée dans la création et la mise à disposition de sites Internet destinés aux indépendants, aux start-ups et aux PME, MicroWeb vous propose la solution clé en main dont vous rêvez.</p>

        </div>

        <div class="grid_4" id="bigsocial">

          <div class="socialtitle">La cuisine est ouverte</div>

          <div class="kitchen">

            <i class="flaticon-chef10"></i>

          </div>

          <span>Du lundi au vendredi</span><br/><br/>

          <span>de 12h00 à 14h30</span><br/>

          <span>de 18h00 à 22h30</span>

        </div>

        <div class="grid_4">

          <div class="title">Contact</div>

          <p>Pour plus d’informations concernant les réservations ou autre, veuillez prendre contact avec notre établissement par téléphone au <a href="#">+32 2 503 46 93</a> ou via <a href="http://www.poivre-et-sel.be/fr/contact">notre formulaire</a>.</p>

        </div>

      <div class="grid_12 copy">

       Copyright © 2013  • 

      <a href="http://www.micro-web.be/fr">

      Designé, Développé et Administré par MicroWeb.

      </a>

      <!-- Locked Icon for Admin Area Link -->

      <a href="<?php echo $_SERVER[SCRIPT_NAME].'/cockpit'; ?>" target="_blank" >

        <span class="flaticon-lock"></span>

      </a>

      </div>         

      </div>    <?php // END CONTAINER_12 ?>

    </div>

</div>

    </body> 

  <!-- JAVASCRIPT - Placed at the end of the document so the pages load faster

  ============================================================================= -->

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>   

    <script type="text/javascript" src="<?php echo Router::webroot('js/portfolio.js'); ?>"></script>    

    <script type="text/javascript" src="<?php echo Router::webroot('js/main.js'); ?>"></script>        

    <script type="text/javascript" src="<?php echo Router::webroot('zoombox/zoombox.js'); ?>"></script>    

</html>

