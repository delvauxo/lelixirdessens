<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[1]->title_for_layout_en; ?>
<?php $description_for_layout = $parametres[1]->description_for_layout_en; ?>

<!-- Start Accordions -->
<section id="Accordions" class="light-section">
  <div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>Menu</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Diverse menus created by the chef to satisfy the finest of palates. Tuesday afternoon, the menu is not aviable. Please make your choice with the Lunch.</p>
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
                            $htmlNoItem .=  "Désolé il n'y a aucune entrée !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($suggestion as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($suggestion[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($suggestion[$cle]->titre_en); ?></p>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Starters</h4>
                        <div class="tap-inner">
                          <?php 
                          // Préviens qu'il n'y a aucun article de la catégorie courante...
                          $nbrarticle = count($entree);
                          if ($nbrarticle < 0) {
                            $htmlNoItem  =  "<div>";
                            $htmlNoItem .=  "Sorry there is no starter !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($entree as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($entree[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($entree[$cle]->nom_en); ?></p>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Dishes</h4>
                        <div class="tap-inner">
                          <?php 
                          // Préviens qu'il n'y a aucun article de la catégorie courante...
                          $nbrarticle = count($plat);
                          if ($nbrarticle < 0) {
                            $htmlNoItem  =  "<div>";
                            $htmlNoItem .=  "Sorry there is no dish !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($plat as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($plat[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($plat[$cle]->nom_en); ?></p>
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
                            $htmlNoItem .=  "Sorry there is no desserts !";
                            $htmlNoItem .=  "</div>";
                            echo $htmlNoItem;
                          }
                          ?>
                          <?php foreach($dessert as $cle=>$valeur) { ?>
                            <div>
                              <p class="prix"><?php echo ucfirst($dessert[$cle]->prix); ?>&nbsp;&euro;</p> 
                              <p class="plat"><?php echo ucfirst($dessert[$cle]->nom_en); ?></p>
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
