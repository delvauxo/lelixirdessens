<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[1]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[1]->description_for_layout_fr; ?>

<!-- Start Accordions -->
<section id="Accordions" class="light-section">
  <div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>La Carte</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Des plats spécialement concoctés par les soins de notre chef pour satisfaire au mieux les plus fins gourmets. Le mardi midi, seul le lunch est disponible.</p>
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
                          <?php 
                          // Préviens qu'il n'y a aucun article de la catégorie courante...
                          $nbrarticle = count($suggestion);
                          if ($nbrarticle < 0) {
                            $htmlNoItem  =  "<div>";
                            $htmlNoItem .=  "Désolé il n'y a aucune suggestion !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($suggestion as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($suggestion[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($suggestion[$cle]->titre_fr); ?></p>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Entrées</h4>
                        <div class="tap-inner">
                          <?php 
                          // Préviens qu'il n'y a aucun article de la catégorie courante...
                          $nbrarticle = count($entree);
                          if ($nbrarticle < 0) {
                            $htmlNoItem  =  "<div>";
                            $htmlNoItem .=  "Désolé il n'y a aucune entrée !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($entree as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($entree[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($entree[$cle]->nom_fr); ?></p>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Plats</h4>
                        <div class="tap-inner">
                          <?php 
                          // Préviens qu'il n'y a aucun article de la catégorie courante...
                          $nbrarticle = count($plat);
                          if ($nbrarticle < 0) {
                            $htmlNoItem  =  "<div>";
                            $htmlNoItem .=  "Désolé il n'y a aucune entrée !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($plat as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($plat[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($plat[$cle]->nom_fr); ?></p>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Desserts</h4>
                        <div class="tap-inner">
                          <?php 
                          // Préviens qu'il n'y a aucun article de la catégorie courante...
                          $nbrarticle = count($dessert);
                          if ($nbrarticle < 0) {
                            $htmlNoItem  =  "<div>";
                            $htmlNoItem .=  "Désolé il n'y a aucune entrée !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($dessert as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($dessert[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($dessert[$cle]->nom_fr); ?></p>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Accordions -->
