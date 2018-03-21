<!DOCTYPE html>
<html lang="fr">
<head>
  <title>L'&Eacute;lixir des sens - Restaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo Router::webroot('css/front/w3.css'); ?>">
  <link rel="stylesheet" href="<?php echo Router::webroot('css/front/basic.css'); ?>">
  <!-- Slideshow CSS -->
  <link rel="stylesheet" href="<?php echo Router::webroot('slideshow/css/flexslider.css') ;?>" type="text/css" media="screen" />
  <!-- Google Fonts CSS-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body>

<header>
  <!-- Navigation TOPBAR -->
  <nav id="navbar" class="w3-row">
    <div id="logo" class="w3-col m1">
      <img src="<?php echo Router::webroot('img/layout/frontoffice/logo.jpg'); ?>" alt="Logo L'éxlixir des sens">
    </div>
    <div id="logo-txt" class="w3-col m4">
      <span>L'&eacute;lixir des sens</span>
    </div>
    <div id="topnav" class="w3-col m7">
      <ul class="topnav">
        <li><a class="active" href="#accueil">ACCUEIL</a></li>
        <li><a href="#carte">LA CARTE</a></li>
        <li><a href="#menus">MENU</a></li>
        <li><a href="#photos">PHOTOS</a></li>
        <li><a href="#reservation">R&Eacute;SERVATION</a></li>
        <li><a href="#contact">CONTACT</a></li>
      </ul>
    </div>
  </nav>
</header><!-- /header -->


<!-- Slideshow -->
<section class="slider">
  <div class="flexslider">
    <ul class="slides">
      <li>
        <img src="<?php echo Router::webroot('img/slideshow/salle_01.jpg'); ?>" />
      </li>
      <li>
        <img src="<?php echo Router::webroot('img/slideshow/salon_01.jpg'); ?>" />
      </li>
      <li>
        <img src="<?php echo Router::webroot('img/slideshow/facade.jpg'); ?>" />
      </li>
    </ul>
  </div>
</section>


<!-- Start Content Page -->
<section id="content" class="w3-container">

<!-- Section line -->
  <div id="section-line">
    <div id="sec-txt">Chez nous vous trouverez</div>
    <div id="sec-line"></div>
  </div>
  <!-- Services -->
  <div id="services" class="w3-row">
    <div id="terrasse" class="w3-col m4">
      <div class="service">
        <img src="<?php echo Router::webroot('img/services/terrasse.jpg'); ?>">
        <div>Vous aimez manger en terrasse</div>
      </div>
    </div>
    <div id="plat" class="w3-col m4">
      <div class="service">
        <img src="<?php echo Router::webroot('img/services/plat.jpg'); ?>">
        <div>Une qualité de mets extraordinaire</div>
      </div>
    </div>
    <div id="salon" class="w3-col m4">
      <div class="service">
        <img src="<?php echo Router::webroot('img/services/salon.jpg'); ?>">
        <div>L'apéro comme à la maison</div>
      </div>
    </div>
  </div>

<!-- Section line -->
  <div id="section-line">
    <div id="sec-txt">Recommand&eacute; par</div>
    <div id="sec-line"></div>
  </div>
  <!-- Presse -->
  <div id="logos" class="w3-row">
    <div id="gault" class="w3-half">
      <div>
        <img src="<?php echo Router::webroot('img/layout/frontoffice/gault_250.jpg'); ?>" alt="">
      </div>
    </div>
    <div id="trip" class="w3-half">
      <div>
        <img src="<?php echo Router::webroot('img/layout/frontoffice/trip_250.jpg'); ?>" alt="">
      </div>
    </div>
  </div>


<!-- Section line -->
  <div id="section-line">
    <div id="sec-txt">Suggestions du jour</div>
    <div id="sec-line"></div>
  </div>
  <!-- Suggestions -->
  <div id="sug" class="w3-row">
    <div>Suggestion 1</div>
    <div>Suggestion 2</div>
    <div>Suggestion 3</div>
    <div>Suggestion 4</div>
    <div>Suggestion 5</div>
  </div>


</section> <!-- End Content page -->

<footer class="w3-container">
  <!-- Services -->
  <div id="footer" class="w3-row">
    <div id="propos" class="w3-col m4">
      <div class="footer">
        <h4>L'&Eacute;LIXIR DES SENS</h4>
        <div id="iconic" class="w3-row w3-third">
          <i class="material-icons">account_circle</i>
        </div>
        <div>
          A la croisée de Genval et de La Hulpe, non loin de Lasne et Rixensart, le jeune chef Pierre Disneur vous accueille dans l’ambiance feutrée d’une vieille auberge brabançonne. Un restaurant qui sent les produits frais du marché où la cuisine entièrement faite maison et « sur le moment » vous amènera à redécouvrir via une assiette soignée, l’élixir de vos sens. Le lounge-bar vous permettra de prolonger ce plaisir gustatif par un café ou une tisane maison avec ou sans pousse.
        </div>
      </div>
    </div>
    <div id="ouvert" class="w3-col m4">
      <div class="footer">
        <h4>LE RESTAURANT VOUS OUVRE SA CUISINE</h4>
        <div id="iconic" class="w3-row w3-third">
          <i class="material-icons">query_builder</i>
        </div>
        <div id="heures">
          L'&Eacute;lixir des sens et son &eacute;quipe a le plaisir de vous servir durant la semaine<br/><br/>
          <div>
          De mardi à vendredi <br/>
          12h00 à 14h30 et de 18h30 à 22h00<br/><br/>
          Le Samedi uniquement en soirée<br/>
          18h30 à 22h00<br/><br/>
          Le Dimanche uniquement en journée<br/>
          12h00 à 14h30<br/>
          </div>
        </div>
      </div>
    </div>
    <div id="contact" class="w3-col m4">
      <div class="footer">
        <h4>CONTACT</h4>
        <div id="iconic" class="w3-row w3-third">
          <i class="material-icons">perm_phone_msg</i>
        </div>
        <div>
          Pour plus d’informations concernant les réservations ou autre, veuillez prendre contact avec notre établissement par téléphone au +32 2 652 57 06 ou via notre formulaire.
        </div>
      </div>
    </div>
  </div>

</footer>

<div id="end-footer" class="w3-row">Lelixirdessens.com | Copyright &copy; 2016 • Designé, Développé et Administré par MicroWeb.</div>

<!-- Scripts loaded at the end of the page to first load the rest of the page then the script (Slideshow) -->

<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="<?php echo Router::webroot('slideshow/js/jquery.flexslider.js') ;?>"></script>

<script type="text/javascript">

  $(window).load(function(){
    $('.flexslider').flexslider({
      animation: "fade",
      start: function(slider){
        $('body').removeClass('loading');
      }
    });
  });
</script>

<!-- Optional FlexSlider Additions -->
<script src="<?php echo Router::webroot('slideshow/js/jquery.easing.js') ;?>"></script>
<script src="<?php echo Router::webroot('slideshow/js/jquery.mousewheel.js') ;?>"></script>


</body>
</html>

