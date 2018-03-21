<!-- Titre & Description du layout
================================================ -->

<?php $title_for_layout = $parametres[0]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[0]->description_for_layout_fr; ?>

<!-- Start Slider -->
<div class="tp-banner-container No-previous">
  <div id="rev_slider"  class="rev_slider fullwidthabanner" data-version="5.0.7">
    <ul>

      <li data-index="rs-10" data-transition="fade" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-description="">
      <!-- MAIN IMAGE -->
      <img alt="" src="<?php echo Router::webroot('slideshow/images/slider_Plats S2_7.jpg'); ?>" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
      </li>

      <li data-index="rs-11" data-transition="fade" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-description="">
      <!-- MAIN IMAGE -->
      <img alt="" src="<?php echo Router::webroot('slideshow/images/slider_Plats S2_22_pe.jpg'); ?>" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
      </li>

    </ul>
  </div>
</div>
<!-- End Slider -->


<!-- MODAL BOX AT START -->

<!-- Modal -->

<!--<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true"> -->
<!--    <div class="modal-dialog"> -->
<!--        <div class="modal-content"> -->
<!--            <div class="modal-header"> -->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> -->
<!--                </button> -->
<!--                <h4 class="modal-title" id="memberModalLabel">Veuillez prendre connaissance de nos jours de fermeture :</h4> -->
<!--            </div> -->

<!--            <div class="modal-body"> -->

<!-- PDF A TELECHARGER (MENU) -->
<!--                <p>Veuillez prendre connaissance de nos jours de fermeture :</p> -->
<!--                <p> -->
<!--                  <iframe style="height: 750px; width: 100%;" src="<?= url_actuelle().BASE_URL.DS.'webroot/pdf'.DS.'16-115_traiteur_net.pdf'; ?>"></iframe> -->
<!--                </p> -->
<!--                <p><a href="<?= url_actuelle().BASE_URL.DS.'webroot/pdf'.DS.'16-115_traiteur_net.pdf'; ?>">Télécharger le menu</a></p> -->
                
<!-- JOURS DE FERMETURE (VACANCES) -->
<!--                <img src="<? echo Router::webroot('img/layout/frontoffice/aout_2017.png'); ?>"> -->

<!-- FIN VACANCES -->
<!--             </div> -->
<!--             <div class="modal-footer"> -->
<!--                 <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button> -->
<!--             </div> -->
<!--         </div> -->
<!--     </div> -->
<!-- </div>  -->

<!-- END MODAL BOX-->



<!-- Start Welcome To Yamen -->
<section id="Welcome" class="light-section">
  <div class="container inner">

    <div class="row">
      <div class="col-md-12">
        <div class="title-section text-center">
          <h3>Bienvenue au restaurant <br />L'&Eacute;lixir des sens</h3>
          <div class="line-break"></div>
        </div>
        <div class="description-section">
          <?php echo $citation[0]->text; ?>
        </div>
      </div>
    </div>

    <div class="divcod30"></div>

    <div class="row">

      <div class="col-md-4">
        <div class="welcome-Block text-center">
          <div class="Top-welcome">
            <i><img src="<?php echo Router::webroot('img/layout/yaman/home/cocktail.png'); ?> " width="35px" style="margin: -10px -5px 0 0;"></i>
            <img src="<?php echo Router::webroot('img/layout/yaman/home/salon.jpg'); ?> ">
            <h4>Une équipe jeune et dynamique</h4>
          </div>
          <div class="line-break"></div>
          <p></p>
          <div class="Bottom-welcome">
            <p>L'Élixir des Sens, c'est avant tout un personnel jeune et passionné mettant en oeuvre le dynamisme ainsi que toute la curiosité de chacuns d'entre eux pour vous faire passer un moment agréable.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="welcome-Block text-center">
          <div class="Top-welcome">
            <i><img src="<?php echo Router::webroot('img/layout/yaman/home/heart.png'); ?> " width="35px" style="margin-top: -5px;"></i>
            <img src="<?php echo Router::webroot('img/layout/yaman/home/market.jpg'); ?> ">
            <h4>Des produits frais dans votre assiette</h4>
          </div>
          <div class="line-break"></div>
          <p></p>
          <div class="Bottom-welcome">
            <p>Le chef met un point d'honneur à offrir à sa clientèle une cuisine faite de produits frais et de saison, ainsi que des plats soignés et colorés qui raviront les plus fins gourmets.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="welcome-Block text-center">
          <div class="Top-welcome">
            <i><img src="<? echo Router::webroot('img/layout/yaman/home/terrace.png'); ?>" width="35px" style="margin-top: -10px;"></i>
            <img src="<? echo Router::webroot('img/layout/yaman/home/terrasse.jpg'); ?> ">
            <h4>La terrasse</h4>
          </div>
          <div class="line-break"></div>
          <p></p>
          <div class="Bottom-welcome">
            <p>Profitez de notre bel espace terrasse. Quoi de plus agréable que de profiter de son plat en terrasse lorsque le beau temps est au rendez-vous ?</p>
          </div>
        </div>
      </div>

    </div> <!-- End row -->
  </div> <!-- End container -->
</section>
<!-- End Welcome To Yamen -->


<!-- Start Information -->
<section id="Newsletter" class="dark-section">
  <div class="container inner">
      <div class="row">
          <div class="col-md-12">
                <div class="title-section text-center">
                    <h3>Information</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Veuillez noter que le mardi midi, seul le lunch est disponible.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Information -->


<!-- SLIDESHOW
================================================ -->
<?php
foreach($slides as $cle=>$valeur) 
{
$s			= $slides[$cle]->file;						
$sBis		= $slides[$cle]->file_tmb;						
$linkedTo	= $slides[$cle]->linkedto;					
$caption	= $slides[$cle]->caption;				
?>
<!--<img width="940px" height="350px" src="<?php  echo Router::webroot('slideshow/images/'.$sBis); ?>" /> -->
<?php	}	?>

<!-- Formatage de la date au format FR
============================================ 
<?php
// recuperation depuis la BdD
$posts[$cle]->created; // de la forme AAAA-MM-JJ
// annee, moi, jour
$annee = date('Y',strtotime($posts[$cle]->created));
$mois = date('m',strtotime($posts[$cle]->created));
$jour = date('d',strtotime($posts[$cle]->created));
// date en francais de la forme JJ/MM/AAAA
$ladate_fr = date('d-m-Y',strtotime($posts[$cle]->created));
?> -->

<!-- Pagination
================================================ -->
<?php
/* 
<div class="pagination"> <!-- PAGINATION -->
  <ul>
  <?php for($i=1; $i <= $page; $i++): ?>
    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
  </ul>
</div> <!-- FIN PAGINATION -->
*/ ?>
