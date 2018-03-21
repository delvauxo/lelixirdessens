<!DOCTYPE html>
<html>
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo isset($title_for_layout)?$title_for_layout:'Micro-Web - Home'; ?></title> 
    <meta name="description" content="<?php echo isset($description_for_layout)?$description_for_layout:"MicroWeb est une agence web spécialisée dans la création et la mise à disposition de sites internet destinés aux indépendants, startups et PME. Notre agence web prend en charge toutes les étapes du processus, la création de votre site web, la configuration de l'URL et l'hébergement, l'installation de notre CMS et son paramétrage enfin la rédaction de votre contenu et votre design a l'image de votre entreprise. Faites appel à notre équipe de spécialiste dès à présent."; ?>">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo Router::webroot('css/style2.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo Router::webroot('slideshow/flexslider.css'); ?>" type="text/css" media="screen" />  
    <link rel="stylesheet" href="<?php echo Router::webroot('zoombox/zoombox.css'); ?>" type="text/css" media="screen" /> 
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>   
    <script type="text/javascript" src="<?php echo Router::webroot('zoombox/zoombox.js'); ?>"></script>    
    

    <style type="text/css">
    /* Generated by Font Squirrel (http://www.fontsquirrel.com) on October 16, 2012 */

    @font-face {
        font-family: 'continuum_mediumregular';
        src: url('<?php echo Router::webroot('font/contm-webfont.eot'); ?>');
        src: url('<?php echo Router::webroot('font/contm-webfont.eot?#iefix'); ?>') format('embedded-opentype'),
             url('<?php echo Router::webroot('font/contm-webfont.woff'); ?>') format('woff'),
             url('<?php echo Router::webroot('font/contm-webfont.ttf'); ?>') format('truetype'),
             url('<?php echo Router::webroot('font/contm-webfont.svg#continuum_mediumregular'); ?>') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    </style>

    <script type="text/javascript">
    jQuery(function($){
      $('a.zoombox').zoombox();
    });
    </script> 

    </head>

    <body id="top">

<!-- Google Analytics to place juste after the body opening tag--> 
    <?php include_once(CORE.DS."Analyticstracking.php") ?>

<!-- header --> 
    <div id="header">
        <div id="banner_header">
            <a href="<?php WEBROOT; ?>">
                <img src="<?php echo Router::webroot('/img/layout/microweb/logo.png'); ?>" title="Micro-Web" class="imglogo"/>
            </a>
<!-- réseaux sociaux -->
                <div id="social">
                    <ul>
                    <li><a href="http://www.facebook.com/micro.web.be" title="Nous suivre sur facebook" class="face_ico">facebook</a></li>
                    <li><a href="https://twitter.com/microwebbelgium" title="Nous suivre sur twitter" class="twit_ico">twitter</a></li>
                    <li><a href="#" title="s'abonner aux Flux RSS" class="rss_ico">rss</a></li>
                    <li><a href="mailto:benjamin@micro-web.be" title="Nous Contacter" class="mail_ico">Contact</a></li>
                    </ul>
                    
                </div>
                <?php 
                  // Création d'un vecteur de lien contenant les liens hypertextes de mon menu.
                 $items = array(
                     array("link"=>"/fr/", "label"=>"Accueil"),
                     array("link"=>"/fr/actualite", "label"=>"Carte"),
                     array("link"=>"/fr/services", "label"=>"Menu de Groupe"),
                     array("link"=>"/fr/valeurs", "label"=>"Galerie"),
                     // MENU POUR LE PORTFOLIO 
                     // ======================================================
                     // array("link"=>"/fr/portfolio", "label"=>"Portfolio"),
                     // ======================================================
                     array("link"=>"/fr/propos", "label"=>"R&eacute;servatilon"),
                     array("link"=>"/fr/contact", "label"=>"Vins"));
                     array("link"=>"/fr/contact", "label"=>"Pour les Fêtes"));
                 $menu = '';

                 // Boucle de création de la liste <ul><li> de mon menu.
                 foreach ($items as $val) {
                     $menu .= '<li><a href="http://www.micro-web.be'.$val['link'].'"';
                     // Vérification si la page X est la page en cours
                     // Si oui ajouter la classe « current » à l'élément de la liste
                     if ($_SERVER['REQUEST_URI'] == $val['link'])
                         $menu .= ' class="current"';
                     $menu .= '>'.$val['label'].'</a></li>';
                 }
                 ?>        
<!-- Show Set Flash information -->
                <div>
                    <?php echo $this->Session->flash(); ?>
                </div>


<!-- Menu -->
                <div id="menu02">
                      <ul> 
                            <?php echo $menu;  ?>
                      </ul>
                </div>  
<!-- fin du header -->                
        </div>
    </div>


<!-- Contenu -->
<?php echo stripslashes($content_for_layout); ?>
 
<!--footer -->
<div id="footer">
    <div id="footer02">
            <p><span>Copyright &copy; <?php echo date("Y"); ?> <a href="http://www.micro-web.be" title="Micro-Web.be">MICRO-WEB</a>. Tous droits réservés.</span> design by 
            <a href="http://www.weberland.be" title="Weberland.be - Cuculo Xavier">ONLY MICROWEB</a>
            </p>
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
      

</html>