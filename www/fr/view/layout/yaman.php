<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">

    <title><?= isset($title_for_layout)?$title_for_layout:'L\'&Eacute;lixir des sens - Restaurant Rixensart Genval La Hulpe'; ?></title> 

    <meta name="description" content="<?= strip_tags(isset($description_for_layout))?$description_for_layout:"A la croisée de Genval et de La Hulpe, non loin de Lasne et Rixensart, le jeune chef Pierre Disneur vous accueille dans l’ambiance feutrée d’une vieille auberge brabançonne. Un restaurant qui sent les produits frais du marché où la cuisine entièrement faite maison et « sur le moment » vous amènera à redécouvrir via une assiette soignée, l’élixir de vos sens. Le lounge-bar vous permettra de prolonger ce plaisir gustatif par un café ou une tisane maison avec ou sans pousse."; ?>">

    <!-- FAVICON -->

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Bootstrap core CSS -->

    <link href="<?php echo Router::webroot('css/front/style.css'); ?>" rel="stylesheet">

    <link href="<?php echo Router::webroot('css/front/purple.css'); ?>" rel="stylesheet">

    <link href="<?php echo Router::webroot('css/front/jquery-ui.css'); ?>" rel="stylesheet">

    <link href="<?php echo Router::webroot('zoombox/zoombox.css'); ?>" rel="stylesheet" type="text/css" media="screen" /> 

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="style/js/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->





  </head>



  <body>



<!-- Google Analytics to place juste after the body opening tag--> 

  <?php include_once(CORE.DS."Analyticstracking.php") ?>



<!-- Start Loading -->

<section class="loading-overlay">

    <div class="Loading-Page">

        <h2 class="loader">Loading...</h2>

    </div>

</section>

 <!-- End Loading  -->



<div class="content-wrap">

<div id="home" class="body-wrapper">



<!-- Start Section Header style1 -->

<div id="home" class="body-wrapper">



    <div class="Header-Style1">

        <div class="TopHeader">

            <div class="container">

                <div class="row">

                     <div class="Contact-h col-md-6">

                       <a href="callto:+3226525706">

                         <div class="PhoneNamber hover-top-contact">

                           <p>+32 2 652 57 06</p>

                          </div>

                        </a>

                        <a href="mailto:info@lelixirdessens.com">

                          <div class="Email-Site hover-top-contact">

                            <!-- <p>info@lelixirdessens.com</p> -->

                          </div>

                        </a>

                    </div>

                    <div class="col-md-6 french">

                        <div class="social-ul">

                            <ul class="icons-ul">

                                <!-- AFFICHE LE MULTI-LANGUE QUI SE TROUVE DANS LA FONCTION multi() DE FUNCTIONS.PHP -->

                                <?php echo multi(); ?>

                            </ul>

                        </div>

                     </div>

                 </div>

            </div>

        </div>

        <!-- Start Navbar -->

        <div class="Navbar-Header navbar basic" data-sticky="true" style="border-bottom: 1px solid #4A4A4A;">

            <div class="container menuVcenter">

                <div class="row">

                    <div class="basic-wrapper">

                        <a class="navbar-logo" href="<?= url_actuelle().BASE_URL; ?>"></a>

                    </div>

                    <div class="collapse pull-right navbar-collapse">

                        <div id="cssmenu" class="Menu-Header top-menu">

                            <ul>

                              <!-- AFFICHE LE MENU DE NAVIGATION QUI SE TROUVE DANS LA FONCTION menu() DE FUNCTIONS.PHP -->

                              <?php echo menu(); ?>

                            </ul>

                        </div>

                    </div>

                    

                </div>

            </div>

        </div>

        <!-- End Navbar -->

    </div>



  <div id="bigheader">

    <div class="container_12">



  <!-- FACEBOOK - Incluez le SDK JavaScript sur votre page, de préférence juste après la balise <body>. --> 

      <div id="fb-root"></div>

      <script>

      (function(d, s, id) {

        var js, fjs = d.getElementsByTagName(s)[0];

        if (d.getElementById(id)) return;

        js = d.createElement(s); js.id = id;

        js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

        fjs.parentNode.insertBefore(js, fjs);

      }(document, 'script', 'facebook-jssdk'));

      </script>



    </div> <!-- END DIV CONTAINER12 -->

  </div> <!-- END DIV BIGHEADER -->



  <div id="bigbody">

    <div class="container_12">



  <!-- AFFICHAGE CONTENU -->

      <div class="clear"></div>

      <?php echo stripslashes($content_for_layout); ?>

    </div><!-- END DIV CONTAINER12-->



<!-- Start Footer -->



<section id="footer-4">

  <div class="container inner-f">

      <div class="row">

      <div class="Footer-Blocks">





      <!-- Start Last Post Footer -->



              <div class="col-md-4">

                  <div class="Top-Block-Footer">

                      <h2>Informations de Contact</h2>

                    </div>

                    <div class="divcod20"></div>

                      <div class="Block-Contact">

                        <ul>

                          <li>

                            <i class="fa fa-map-marker" style="font-size: 20px;"></i>

                            <p>Avenue Albert 1er, 38<br />

                            1332 Genval<br />

                            Belgique</p>

                          </li>

                          <li>

                            <i class="fa fa-phone" style="font-size: 20px;"></i>

                            <p>+32 2 652 57 06</p>

                          </li>

                          <li>
                            <!-- 
                            <i class="fa fa-envelope"></i>

                            <p><a href="mailto:contact@lelixirdessens.com">contact@lelixirdessens.com</a></p>
                            -->
                          </li>

                        </ul> 

                      </div>  

                </div>

      <!-- End Last Post Footer -->



      <!-- Start Last Post Footer -->

              <div class="col-md-4">

                  <div class="Top-Block-Footer">

                      <h2>Heures d'ouvertures</h2>

                    </div>

                    <div class="divcod20"></div>

                    <div class="Bottom-Block-Footer">

                        <div class="About">

                            <p><b>Lundi</b> : Fermé</p>

                            <p><b>Mardi</b> : 12.00 - 14.00 et 19.00 - 22.00</p>

                            <p><b>Mercredi</b> : 12.00 - 14.00 et 19.00 - 22.00</p>

                            <p><b>Jeudi</b> : 12.00 - 14.00 et 19.00 - 22.00</p>

                            <p><b>Vendredi</b> : 12.00 - 14.00 et 19.00 - 22.00</p>

                            <p><b>Samedi</b> : 19.00 - 22.00</p>

                            <p><b>Dimanche</b> : 12.00 - 14.00</p>

                          </div>

                      </div>

                </div>

      <!-- End Last Post Footer -->



      <!-- Start Follow Footer -->

        <div class="col-md-4">

          <div class="Top-Block-Footer">

            <h2>Restez informés !</h2>

          </div>

          <div class="divcod20"></div>

          <div class="Bottom-Block-Footer">

            <div class="Join-Footer">

              <div id="mc_embed_signup">

                <form action="http://fobles.us10.list-manage.com/subscribe/post?u=0733acea8768d8355b073fa38&amp;id=726e299dd0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

                  <input type="email" value="" placeholder="Email - Inscription à notre Newsletter" name="EMAIL" class="txt-box required email" id="mce-EMAIL">

                  <input type="submit" value="S'inscire" name="subscribe" id="mc-embedded-subscribe" class="button btn btnjoin">

                </form>

              </div>

            </div>

          </div>

        </div>

      <!-- End Follow Footer -->



       </div>

         </div>

  </div>

</section>



<section id="Bottom-Footer">

  <div class="container inner-f">

      <div class="row">

      <div class="col-md-6">

              <div class="Rights-Reserved">

                  <h2>Tous droits réservés © 2016.

                </div>

            </div>

      <div class="col-md-6 text-right">

              <div class="Link-Footer">

                  <ul>

                  <?php echo menuFooter(); ?>

                  </ul>

                </div>

            </div>

    </div>

    </div>

</section>



<!-- End Footer -->



</div>



<!-- Back to top Link -->

  <div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>

</div>





<!-- Placed at the end of the document so the pages load faster -->



<script type="text/javascript" src="<?php echo Router::webroot('js/jquery-1.11.3.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery-ui.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/bootstrap.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/menu-script.js'); ?>"></script>



<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.themepunch.revolution.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.themepunch.tools.min.js'); ?>"></script>



<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.video.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.slideanims.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.actions.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.layeranimation.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.kenburn.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.navigation.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.migration.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/revolution.extension.parallax.min.js'); ?>"></script>



<script type="text/javascript" src="<?php echo Router::webroot('js/instafeed.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/instgram_custom.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/rev_custom.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/isotope.pkgd.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.easing.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.elevateZoom-3.0.8.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.fancybox.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.fancybox.pack.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.fancybox-media.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.inview.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jflickrfeed.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/tweetie.min.js'); ?>"></script>



<script type="text/javascript" src="<?php echo Router::webroot('js/modernizr.custom.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/classie.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/main.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/owl.carousel.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/jquery.counterup.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/waypoints.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/wow.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/custom.js'); ?>"></script>

<script type="text/javascript" src="<?php echo Router::webroot('js/zoombox.js'); ?>"></script>


<!-- DATEPICKER FUNCTION -->

<script>
$( "#date3" ).datepicker({
  firstDay: 1,
  dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
  dayNames: [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],
});
</script>


<!-- ZOOMBOX JQUERY -->

  <script type="text/javascript">

  jQuery(function($){

    $('a.zoombox').zoombox();

  });

  </script> 



  <script>

    $(document).ready(function () {



    $('#memberModal').modal('show');



});

  </script>



</body>

</html>



