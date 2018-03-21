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

           <div class="accor-css">

              <div class="section-content row" id="accordionz">

                <a class="col-md-3 collapsed" data-toggle="collapse" href="#collapseOne" data-parent="#accordionz">
                  <h4 class="accor-title">
                    <span><?= $prix[0]->nom; ?></span>
                    <p><?= $prix[0]->prix; ?> €</p>
                  </h4>
                </a>

                <a class="col-md-3 collapsed" data-toggle="collapse" href="#collapseTwo" data-parent="#accordionz">
                  <h4 class="accor-title">
                    <span><?= $prix[1]->nom; ?></span>
                    <p><?= $prix[1]->prix; ?> €</p>
                  </h4>
                </a>

                <a class="col-md-3 collapsed" data-toggle="collapse" href="#collapseThree" data-parent="#accordionz">
                  <h4 class="accor-title">
                    <span><?= $prix[2]->nom; ?></span>
                    <p><?= $prix[2]->prix; ?> €</p>
                  </h4>
                </a>

                <div class="panel"> <!-- PANELS -->

                  <div class="accor-inner collapse col-md-12" id="collapseOne"> <!-- SLIDE-DOWN -->

                  <div class="lorem">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ab adipisci doloremque expedita fugiat hic id commodi. Cupiditate provident quos repudiandae amet. Corrupti sequi nisi ab eum error amet! Nisi!</p>
                  </div>

                    <div class="row">
                      <?php $count = count($entree1); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-3 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? $entree1[0]->img = "http://www.lelixirdessens.com/fr/img/portfolio/87_1475066925.jpg"; ?>
                            <? if ($entree1[$i]->img) {
                              echo '<img src="'. $entree1[$i]->img . '">';
                            } else {
                              echo '<img src="http://www.lelixirdessens.com/fr/img/portfolio/83_1475066739.jpg">';
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
                      <div class="col-md-3 divider">
                        <div class="entree"> 
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? $plat1[0]->img = "http://www.lelixirdessens.com/fr/img/portfolio/90_1475067039.jpg"; ?>
                            <? if ($plat1[$i]->img) {
                              echo '<img src="'. $plat1[$i]->img . '">';
                            } else {
                              echo '<img src="http://www.lelixirdessens.com/fr/img/portfolio/88_1475066965.jpg">';
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
                      <div class="col-md-3 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($dessert1[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $dessert1[$i]->img . '') . '">';
                            } else {
                              echo '<img src="http://www.lelixirdessens.com/fr/img/portfolio/92_1475067190.jpg">';
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
                    
                    <?= $prix[0]->prix_ss_dessert; ?>

                  </div> <!-- MENU#1 SLIDE-DOWN END -->

                  <div class="accor-inner collapse col-md-12" id="collapseTwo"> <!-- MENU#2 SLIDE-DOWN -->

                  <div class="row">
                      <?php $count = count($entree2); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-3 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($entree2[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $entree2[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($entree2[$i]->type === '2') { echo 'Entrée 1'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($entree2[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                    <div class="row">
                      <?php $count = count($entree2bis); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-3 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($entree2bis[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $entree2bis[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($entree2bis[$i]->type === '5') { echo 'Entrée 2'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($entree2bis[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                    <div class="row">
                      <?php $count = count($plat2); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-3 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($plat2[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $plat2[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($plat2[$i]->type === '3') { echo 'Plat'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($plat2[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                    <div class="row">
                      <?php $count = count($dessert2); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-3 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($dessert2[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $dessert2[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($dessert2[$i]->type === '4') { echo 'Dessert'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($dessert2[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                    <?= $prix[1]->prix_ss_dessert; ?>

                  </div> <!-- MENU#2 SLIDE-DOWN END -->

                  <div class="accor-inner collapse col-md-12" id="collapseThree"> <!-- MENU#3 SLIDE-DOWN -->

                  <div class="row">
                      <?php $count = count($entree3Un); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-4 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($entree3Un[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $entree3Un[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($entree3Un[$i]->type === '6') { echo 'Entrée 1'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($entree3Un[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                  <div class="row">
                      <?php $count = count($entree3Dos); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-4 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($entree3Dos[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $entree3Dos[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($entree3Dos[$i]->type === '7') { echo 'Entrée 2'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($entree3Dos[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                  <div class="row">
                      <?php $count = count($entree3Tres); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-4 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($entree3Tres[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $entree3Tres[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($entree3Tres[$i]->type === '8') { echo 'Entrée 3'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($entree3Tres[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                  <div class="row">
                      <?php $count = count($plat3); ?>
                      <?php for ($i=0; $i < $count; $i++) { ?>
                      <div class="col-md-4 divider">
                        <div class="entree">
                          <!-- ILLUSTRATION -->
                          <div class="entree-illu">
                            <? if ($plat3[$i]->img) {
                              echo '<img src="' . Router::webroot('img/menus/'. $plat3[$i]->img . '') . '">';
                            } else {
                              echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                            } ?>
                            <!-- CATEGORIE -->
                            <div class="entree-cat">
                              <? if ($plat3[$i]->type === '3') { echo 'Plat'; } ?>
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="entree-desc">
                              <? echo ucfirst($plat3[$i]->nom); ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>

                    <div class="row">
                        <?php $count = count($dessert3); ?>
                        <?php for ($i=0; $i < $count; $i++) { ?>
                        <div class="col-md-4 divider">
                          <div class="entree">
                            <!-- ILLUSTRATION -->
                            <div class="entree-illu">
                              <? if ($dessert3[$i]->img) {
                                echo '<img src="' . Router::webroot('img/menus/'. $dessert3[$i]->img . '') . '">';
                              } else {
                                echo '<img src="' . Router::webroot('img/menus/default.jpg') . '">';
                              } ?>
                              <!-- CATEGORIE -->
                              <div class="entree-cat">
                                <? if ($dessert3[$i]->type === '4') { echo 'Dessert'; } ?>
                              </div>
                              <!-- DESCRIPTION -->
                              <div class="entree-desc">
                                <? echo ucfirst($dessert3[$i]->nom); ?>
                              </div> 
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>

                  </div> <!-- MENU#3 SLIDE-DOWN END -->

                </div> <!-- PANNEL END -->

              </div> <!-- SECTION-CONTENT END -->

            </div>

          </div>






        </div>
    </div>
</section>

<!-- End Accordions -->