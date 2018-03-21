<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[0]->title_for_layout_en; ?>
<?php $description_for_layout = $parametres[0]->description_for_layout_en; ?>

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

      <li data-index="rs-12" data-transition="fade" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-description="">
        <!-- MAIN IMAGE -->
        <img src="<?php echo Router::webroot('slideshow/images/slider_Plats S2_2.jpg'); ?>" data-bgposition="center bottom" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
      </li>

    </ul>
  </div>
</div>

<!-- End Slider -->

<!-- Start Welcome To Yamen -->
<section id="Welcome" class="light-section">
  <div class="container inner">
      <div class="row">
          <div class="col-md-12">
                <div class="title-section text-center">
                    <h3>Welcome to our restaurant <br />L'&Eacute;lixir des sens</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>A place where you will discover new sensations with new tastes – the "Elixir" of your senses.</p>
                </div>
            </div>
        </div>
        <div class="divcod30"></div>
      <div class="row">
      <div class="col-md-4">
        <div class="welcome-Block text-center">
          <div class="Top-welcome">
            <i><img src="<? echo Router::webroot('img/layout/yaman/home/terrace.png'); ?>" width="35px" style="margin-top: -10px;"></i>
            <img src="<? echo Router::webroot('img/layout/yaman/home/terrasse.jpg'); ?> ">
            <h4>The Terrace</h4>
          </div>
          <div class="line-break"></div>
          <p></p>
          <div class="Bottom-welcome">
            <p>Enjoy our beautiful terrace. What's better than eating outdoors when the weather is sunny ?</p>
          </div>
        </div>
            </div>
      <div class="col-md-4">
        <div class="welcome-Block text-center">
          <div class="Top-welcome">
            <i><img src="<?php echo Router::webroot('img/layout/yaman/home/heart.png'); ?> " width="35px" style="margin-top: -5px;"></i>
            <img src="<?php echo Router::webroot('img/layout/yaman/home/market.jpg'); ?> ">
            <h4>Fresh products in your plate</h4>
          </div>
          <div class="line-break"></div>
          <p></p>
          <div class="Bottom-welcome">
            <p>A restaurant with an enticing scent of home-made recipes, using fresh produce from the market which will stimulate your taste buds.</p>
          </div>
        </div>
            </div>
      <div class="col-md-4">
        <div class="welcome-Block text-center">
          <div class="Top-welcome">
            <i><img src="<?php echo Router::webroot('img/layout/yaman/home/cocktail.png'); ?> " width="35px" style="margin: -10px -5px 0 0;"></i>
            <img src="<?php echo Router::webroot('img/layout/yaman/home/salon.jpg'); ?> ">
            <h4>The lounge bar</h4>
          </div>
          <div class="line-break"></div>
          <p></p>
          <div class="Bottom-welcome">
            <p>The lounge bar provides the ideal place to relax after your meal and enjoy a coffee, tea/tisane or a digestive "pousse café".</p>
          </div>
        </div>
            </div>

        </div>
    </div>
</section>

<!-- End Welcome To Yamen -->

<!-- Start Why Us -->
<section class="dark-section">
  <div class="container inner">
        <div class="row">
          <div class="col-md-6">
              <div class="Features-Block">
		            <div>
	                <h3>L'&Eacute;LIXIR DES SENS</h3>
                  <div class="line-break"></div>
		            </div>
                <?php echo $citation[0]->text_en; ?>
                </div>
            </div>
          <div class="col-md-6">
              <div class="Block-Img hvr-wobble-vertical">
                  <img src="<?php echo Router::webroot('img/layout/yaman/home/Plats S2_66.jpg'); ?>" alt="Features" width="812" height="516" >
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Why Us -->

<!-- Start Suggestions -->
<section id="Accordions" class="light-section">
	<div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>Chef's suggestions</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Dishes created by the chef to satisfy the finest of palates.</p>
                </div>
            </div>
        </div>
        <div class="divcod20"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Suggestions</h4>
                        <div class="tap-inner">
													<!-- FOREACH block -->
													<?php
													foreach($sixe as $cle=>$valeur) {
													?>
													<div>
														<p class="prix"><?php echo $sixe[$cle]->prix; ?>&nbsp;&euro;</p>	
														<p class="plat"><?php echo ucfirst($sixe[$cle]->titre_en); ?></p>
													</div>
												<?php	} // ENDFOREACH	?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Suggestions -->


<!-- Start Newsletter -->
<section id="Newsletter" class="dark-section">
  <div class="container inner">
      <div class="row">
          <div class="col-md-12">
                <div class="title-section text-center">
                    <h3>Information</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p> Tuesday afternoon, the menu is not aviable. Please make your choice with the Lunch.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Newsletter -->



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
================================================ 
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
