<!DOCTYPE html>

<html>

    <head> 

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 

    <title><?php echo isset($title_for_layout)?$title_for_layout:'Restaurant Poivre et Sel'; ?></title> 

    <meta name="description" content="<?php echo strip_tags(isset($description_for_layout))?$description_for_layout:"Un restaurant qui sent les produits frais du marché où la cuisine entièrement fait maison et "sur le moment" vous amènera à redécouvrir via une assiette soignée, l'Elixir de vos sens."; ?>">



<!-- Facebook 'Like button' meta's -->

    <meta property="og:url" content="<?php echo $url_for_fb; ?>">

    <meta property="og:title" content="<?php echo $title_for_fb; ?>">

    <meta property="og:description" content="<?php echo $description_for_fb; ?>">

    <meta property="og:image" content="<?php echo $thumb_for_fb; ?>">

    <meta property="og:type" content="profile">



    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />



    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/960.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/demo.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/font.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/reset.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/style.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/flaticon.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('css/front/infieldlabel.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo Router::webroot('slideshow/flexslider.css'); ?>" type="text/css" media="screen" />  

    <link rel="stylesheet" href="<?php echo Router::webroot('zoombox/zoombox.css'); ?>" type="text/css" media="screen" /> 

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,800' rel='stylesheet' type='text/css'>



    <!-- JAVASCRIPT - Place them at the end of the document and so the pages will load faster

    ============================================================================= -->

    <script type="text/javascript" src="<?php echo Router::webroot('js/jquery.localscroll.js'); // SCROLLTO ?>"></script>        

    <script type="text/javascript" src="<?php echo Router::webroot('js/jquery.scrollTo.js'); // SCROLLTO ?>"></script>        

    <script type="text/javascript" src="<?php echo Router::webroot('js/lancement.js'); // SCROLLTO ?>"></script>        

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script type="text/javascript" src="<?php echo Router::webroot('js/main.js'); ?>"></script>        

    <script type="text/javascript" src="<?php echo Router::webroot('js/jquery.infieldlabel.min.js'); ?>"></script>   

    <script type="text/javascript" src="<?php echo Router::webroot('js/bootstrap.min.js'); ?>"></script>        

    <script type="text/javascript" src="<?php echo Router::webroot('js/scrollmenu.js'); // SCROLLMENU ?>"></script>        





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



    /* Font DanielRegular Generated by Font Squirrel */

    @font-face {

        font-family: 'danielregular';

        src: url('<?php echo Router::webroot('font/daniel-webfont.eot'); ?>');

        src: url('<?php echo Router::webroot('font/daniel-webfont.eot?#iefix'); ?>') format('embedded-opentype'),

             url('<?php echo Router::webroot('font/daniel-webfont.woff'); ?>') format('woff'),

             url('<?php echo Router::webroot('font/daniel-webfont.ttf'); ?>') format('truetype'),

             url('<?php echo Router::webroot('font/daniel-webfont.svg#danielregular'); ?>') format('svg');

        font-weight: normal;

        font-style: normal;

    }



    [class^="flaticon-"]:before, [class*=" flaticon-"]:before,

    [class^="flaticon-"]:after, [class*=" flaticon-"]:after {   

      font-family: Flaticon;

      font-style: normal;

    }

    </style>



  <script>

  $(function() {

    $( "#date3" ).datepicker();

  });

  </script>



    <script type="text/javascript" charset="utf-8">

      $(function(){ $("label").inFieldLabels(); });

    </script>

    <!--[if lte IE 6]>

      <style type="text/css" media="screen">

        form label {

            background: #fff;

        }

      </style>

    <![endif]-->



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



<!-- FACEBOOK - Incluez le SDK JavaScript sur votre page, de préférence juste après la balise <body>. --> 

  <div id="fb-root"></div>

  <script>(function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

    fjs.parentNode.insertBefore(js, fjs);

  }(document, 'script', 'facebook-jssdk'));</script>



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

       array("link"=>"/fr/fetes", "label"=>"Menu Business"),

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

          <p>Venez découvrir au Poivre et Sel une cuisine traditionnelle italienne revisitée où les saveurs, la beauté et l'originalité des plats ne laissent personne indifférent !</p>

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



    <!-- Load the FlexSlider || IMPORTANT : To load just BEFORE the JS file "jquery.flexslider-min.js" --> 

    <script type="text/javascript">

        $(window).load(function() {

            $('.flexslider').flexslider({

                animation: "fade",              //String: Select your animation type, "fade" or "slide"

                slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"

                slideshow: true,                //Boolean: Animate slider automatically

                slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds

                animationDuration: 2000,         //Integer: Set the speed of animations, in milliseconds

                directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)

                controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage

                keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys

                mousewheel: false,              //Boolean: Allow slider navigating via mousewheel

                prevText: "Previous",           //String: Set the text for the "previous" directionNav item

                nextText: "Next",               //String: Set the text for the "next" directionNav item

                pausePlay: false,               //Boolean: Create pause/play dynamic element

                pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item

                playText: 'Play',               //String: Set the text for the "play" pausePlay item

                randomize: false,               //Boolean: Randomize slide order

                slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)

                animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end

                pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.

                pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering

                controlsContainer: "",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.

                manualControls: "",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.

                start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide

                before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation

                after: function(){},            //Callback: function(slider) - Fires after each slider animation completes

                end: function(){}               //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)

            });

        });

    </script>    

    <!-- FlexSlider JS File --> 

    <script type="text/javascript" language="javascript" src="<?php echo Router::webroot('slideshow/jquery.flexslider-min.js'); ?>"></script>

<!-- Permet d'obtenir le plugin zoombox... -->  

  <script type="text/javascript" src="<?php echo Router::webroot('zoombox/zoombox.js'); ?>"></script>    

  <script type="text/javascript">

  jQuery(function($){

    $('a.zoombox').zoombox({

        theme : 'zoombox',

        opacity : 0.8

    });

  });

  </script>

      



</html>
