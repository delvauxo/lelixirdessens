<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[2]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[2]->description_for_layout_fr; ?>


<!-- Start Accordions -->
<section id="Accordions" class="light-section">
  <div class="container inner">

        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center" style="margin-bottom: 0px;">
                    <h3>Proposition de Menus</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>
                      Vous êtes 8 personnes ou plus, désireux d'organiser un évènement à l'&Eacute;lixir des sens ?
                      <br/>Nous vous accueillons avec grand plaisir, vous n'avez qu'à faire votre choix parmi notre proposition de menus. 
                      <br/><br/>N'hésitez pas, à nous contacter pour plus de renseignements.
                    </p>
                </div>
            </div>
        </div> <!-- End row -->
     
        <div class="divcod20"></div>
        <div class="row">

          <div class="col-md-12">

            <div class="title-section text-left">
              <h4 class="bold"><?= $prix[0]->nom; ?></h4>
            </div>

            <div class="accor-css">

              <div class="section-content">

                <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <h4 class="accor-title active">
                    <span>Entrée - Plat - Dessert</span>
                    <p><?= $prix[0]->prix; ?> €</p>
                  </h4>
                </a>                

                <div class="accor-inner collapse in" id="collapseOne" data-toggle="collapse" aria-controls="collapseOne" aria-expanded="false"> <!-- SLIDE-DOWN -->

                  <div class="row">
                    <?php $count = count($entree1); ?>
                    <?php for ($i=0; $i < $count; $i++) { ?>
                    <div class="col-md-4 divider">
                      <div class="entree">
                        <!-- ILLUSTRATION -->
                        <div class="entree-illu">
                          <? if ($entree1[$i]->img) {
                            echo '<img src="' . Router::webroot('img/menus/'. $entree1[$i]->img . '') . '">';
                          } else {
                            echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                          } ?>
                          <!-- CATEGORIE -->
                          <div class="entree-cat">
                            <? if ($entree1[$i]->type === '2') { echo 'Entrée'; } ?>
                          </div>
                          <!-- DESCRIPTION -->
                          <div class="entree-desc">
                            <? echo ucfirst($entree1[$i]->nom); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

                  <div class="row">
                    <?php $count = count($plat1); ?>
                    <?php for ($i=0; $i < $count; $i++) { ?>
                    <div class="col-md-4 divider">
                      <div class="entree">
                        <!-- ILLUSTRATION -->
                        <div class="entree-illu">
                          <? if ($plat1[$i]->img) {
                            echo '<img src="' . Router::webroot('img/menus/'. $plat1[$i]->img . '') . '">';
                          } else {
                            echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                          } ?>
                          <!-- CATEGORIE -->
                          <div class="entree-cat">
                            <? if ($plat1[$i]->type === '3') { echo 'Plat'; } ?>
                          </div>
                          <!-- DESCRIPTION -->
                          <div class="entree-desc">
                            <? echo ucfirst($plat1[$i]->nom); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

                  <div class="row">
                    <?php $count = count($dessert1); ?>
                    <?php for ($i=0; $i < $count; $i++) { ?>
                    <div class="col-md-4 divider">
                      <div class="entree">
                        <!-- ILLUSTRATION -->
                        <div class="entree-illu">
                          <? if ($dessert1[$i]->img) {
                            echo '<img src="' . Router::webroot('img/menus/'. $dessert1[$i]->img . '') . '">';
                          } else {
                            echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                          } ?>
                          <!-- CATEGORIE -->
                          <div class="entree-cat">
                            <? if ($dessert1[$i]->type === '4') { echo 'Dessert'; } ?>
                          </div>
                          <!-- DESCRIPTION -->
                          <div class="entree-desc">
                            <? echo ucfirst($dessert1[$i]->nom); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

                </div> <!-- SLIDE-DOWN END -->
              </div> <!-- SECTION-CONTENT END -->

              <div class="section-content" style="margin-bottom: 15px;">
                <h4 class="tap-title"><a href="#" style="display: inline;">Entrée - Plat</a><p style="display: inline; float: right; color: #605676;"><?= $prix[0]->prix_ss_dessert; ?> €</p></h4>
              </div>

              <div class="section-content">
                <h4 class="tap-title"><a href="#" style="display: inline;">Plat</a><p style="display: inline; float: right; color: #605676;"><?= $prix[0]->prix_ss_entree; ?> €</p></h4>
              </div>

            </div>

          </div>

            <div class="col-md-12">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[1]->nom; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active"><a href="#" style="display: inline;">Entrées - Plat - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[1]->prix; ?> €</p></h4>
                        <div class="tap-inner">
                            <div>
                              <b><p>Entrée 1</p></b>
                              <p class="plat">
                                <?php $count = count($entree2); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($entree2[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Entrée 2</p></b>
                              <p class="plat">
                                <?php $count = count($entree2bis); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($entree2bis[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Plat</p></b>
                              <p class="plat">
                                <?php $count = count($plat2); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($plat2[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dessert</p></b>
                              <p class="plat">
                                <?php $count = count($dessert2); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($dessert2[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="section-content" style="margin-bottom: 15px;">
                        <h4 class="tap-title"><a href="#" style="display: inline;">Entrées - Plat</a><p style="display: inline; float: right; color: #605676;"><?= $prix[1]->prix_ss_dessert; ?> €</p></h4>
                    </div>
                    <div class="section-content">
                        <h4 class="tap-title"><a href="#" style="display: inline;">Plat - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[1]->prix_ss_entree; ?> €</p></h4>
                    </div>
                </div>
            </div>
        <div class="divcod20"></div>
            <div class="col-md-12">
                <div class="title-section text-left">
                    <h4 class="bold"><?= $prix[2]->nom; ?></h4>
                </div>          
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active"><a href="#" style="display: inline;">Entrées - Plat - Dessert</a><p style="display: inline; float: right; color: #605676;"><?= $prix[2]->prix; ?> €</p></h4>
                        <div class="tap-inner">
                            <div>
                              <b><p>Entrée 1</p></b>
                              <p class="plat">
                                <?php $count = count($entree3Un); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($entree3Un[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Entrée 2</p></b>
                              <p class="plat">
                                <?php $count = count($entree3Dos); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($entree3Dos[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Entrée 3</p></b>
                              <p class="plat">
                                <?php $count = count($entree3Tres); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($entree3Tres[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Plat</p></b>
                              <p class="plat">
                                <?php $count = count($plat3); ?>
                                <?php for ($i=0; $i < $count; $i++) { 
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($plat3[$i]->nom) . '<br/>';
                                } ?>
                              </p>
                            </div>
                            <div>
                              <b><p>Dessert</p></b>
                              <p class="plat">
                                <?php $count = count($dessert3); ?>
                                <?php for ($i=0; $i < $count; $i++) {
                                  if ($i > 0) {
                                    echo 'ou<br/>';
                                  }
                                  echo '- ' . ucfirst($dessert3[$i]->nom) . '<br/>';
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