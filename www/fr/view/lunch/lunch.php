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
                    <h3>Lunch</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Voici le lunch de la semaine</p>
                </div>
            </div>
        </div>
        <div class="divcod20"></div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="section-content" style="text-align: center;">
                        <?php $count = count($lunch); ?>
                        <?php for ($i=0; $i < $count; $i++) { ?>
                            <iframe style="height: 1000px; width: 60%;" src="<?= url_actuelle().BASE_URL.DS.'webroot/pdf'.DS.$lunch[$i]->file; ?>"></iframe>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End Accordions -->