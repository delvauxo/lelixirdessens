<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[4]->title_for_layout_en; ?>
<?php $description_for_layout = $parametres[4]->description_for_layout_en; ?>


<!-- Start Accordions -->
<section id="Accordions" class="light-section">
  <div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>Gallery</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Discover the photos of dishes created by the chef, the restaurant, the personnel and more ….</p>
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
											// ON VA CHERCHER LES IMAGES DANS LE DOSSIER FR ET NON EN EN REMPLACANT EN PAR FR
											$string           =   Router::webroot('img/portfolio/'.$portfolio[$cle]->file);
											$patterns         =   '#/en/#';
											$replacements     =   '/fr/';
											$ultra            =   preg_replace($patterns, $replacements, $string);
											// IDEM POUR LE FICHIER A LA TAILLE ORIGINALE [LINK]
											$string1           =   Router::webroot('img/portfolio/'.$portfolio[$cle]->file_full);
											$patterns1         =   '#/en/#';
											$replacements1     =   '/fr/';
											$ultra1            =   preg_replace($patterns1, $replacements1, $string1);
											?>
											<!-- THUMB Image - AFFICHAGE-->	
											<a class="fade zoombox zgallery1" href="<?php echo $ultra1; ?>">
												<img src="<?php echo $ultra; ?>">
											</a>
											<?php } // ENDFOREACH ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End Accordions -->