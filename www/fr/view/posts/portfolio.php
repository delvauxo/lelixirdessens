<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[4]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[4]->description_for_layout_fr; ?>


<!-- Start Accordions -->
<section id="Accordions" class="light-section">
  <div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>Photos</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Découvrez les photos de plats réalisés par le Chef, de l'établissement, du personnel et bien plus encore...</p>
                </div>
            </div>
        </div>
        <div class="divcod20"></div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="section-content" id="portfoliopics">
											<!-- AFFICHAGE PHOTOS -->
											<?php
											foreach($portfolio as $cle=>$valeur) {
											?>
											<!-- THUMB Image - AFFICHAGE-->	
											<a class="fade zoombox zgallery1" href="<?php echo Router::webroot('img/portfolio/'.$portfolio[$cle]->file_full); ?>">
												<img src="<?php echo Router::webroot('img/portfolio/'.$portfolio[$cle]->file); ?>">
											</a>
											<?php } // ENDFOREACH ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End Accordions -->