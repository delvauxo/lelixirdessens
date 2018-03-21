<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[2]->title_for_layout_en; ?>
<?php $description_for_layout = $parametres[2]->description_for_layout_en; ?>

<!-- Start Accordions -->
<section id="Accordions" class="light-section">
  <div class="container inner">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>Menus</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>You want to organize a banquet at our restaurant ? <br/>Please make your choice from our menu proposal.</p>
                </div>
            </div>
        </div>
        <div class="divcod20"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[0]->nom_bois_en . ' - ' . $prix[0]->prix_boisson . ' €'; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <div class="tap-inner" style="display: block;">
                          <p>
                          <?php $count = count($boisson1); ?>
                          <?php for ($i=0; $i < $count; $i++) { 
                            echo ucfirst($boisson1[$i]->nom_en) . '<br/>';
                          } ?>
                          </p>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="col-md-6">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[1]->nom_bois_en . ' - ' . $prix[1]->prix_boisson . ' €'; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <div class="tap-inner" style="display: block;">
                          <p>
                          <?php $count = count($boisson2); ?>
                          <?php for ($i=0; $i < $count; $i++) { 
                            echo ucfirst($boisson2[$i]->nom_en) . '<br/>';
                          } ?>
                          </p>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
     
        <div class="divcod20"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[0]->nom_en; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active"><a href="#" style="display: inline;">Starter - Dish - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[0]->prix; ?> €</p></h4>
                        <div class="tap-inner">
                            <div>
                              <b><p>Starter</p></b>
                              <p class="plat">
                                <?php $count = count($entree1); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($entree1[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dish</p></b>
                              <p class="plat">
                                <?php $count = count($plat1); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($plat1[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dessert</p></b>
                              <p class="plat">
                                <?php $count = count($dessert1); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($dessert1[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" style="margin-bottom: 15px;">
                        <h4 class="tap-title"><a href="#" style="display: inline;">Starter - Dish</a><p style="display: inline; float: right; color: #605676;"><?= $prix[0]->prix_ss_dessert; ?> €</p></h4>
                    </div>
                    <div class="section-content">
                        <h4 class="tap-title"><a href="#" style="display: inline;">Dish - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[0]->prix_ss_entree; ?> €</p></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[1]->nom_en; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active"><a href="#" style="display: inline;">Starters - Dish - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[1]->prix; ?> €</p></h4>
                        <div class="tap-inner">
                            <div>
                              <b><p>Starter 1</p></b>
                              <p class="plat">
                                <?php $count = count($entree2); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($entree2[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Starter 2</p></b>
                              <p class="plat">
                                <?php $count = count($entree2bis); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($entree2bis[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dish</p></b>
                              <p class="plat">
                                <?php $count = count($plat2); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($plat2[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dessert</p></b>
                              <p class="plat">
                                <?php $count = count($dessert2); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($dessert2[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" style="margin-bottom: 15px;">
                        <h4 class="tap-title"><a href="#" style="display: inline;">Starters - Dish</a><p style="display: inline; float: right; color: #605676;"><?= $prix[1]->prix_ss_dessert; ?> €</p></h4>
                    </div>
                    <div class="section-content">
                        <h4 class="tap-title"><a href="#" style="display: inline;">Dish - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[1]->prix_ss_entree; ?> €</p></h4>
                    </div>
                </div>
            </div>
        <div class="divcod20"></div>
            <div class="col-md-12">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[2]->nom_en; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active"><a href="#" style="display: inline;">Starters - Dish - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[2]->prix; ?> €</p></h4>
                        <div class="tap-inner">
                            <div>
                              <b><p>Starter 1</p></b>
                              <p class="plat">
                                <?php $count = count($entree3Un); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($entree3Un[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Starter 2</p></b>
                              <p class="plat">
                                <?php $count = count($entree3Dos); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($entree3Dos[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Starter 3</p></b>
                              <p class="plat">
                                <?php $count = count($entree3Tres); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($entree3Tres[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dish</p></b>
                              <p class="plat">
                                <?php $count = count($plat3); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($plat3[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dessert</p></b>
                              <p class="plat">
                                <?php $count = count($dessert3); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'or<br/>';
                                  }
                                  echo '- ' . ucfirst($dessert3[$i]->nom_en) . '<br/>';
                                } ?>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Accordions -->