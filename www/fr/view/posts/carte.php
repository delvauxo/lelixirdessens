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
                    <p>Des plats spécialement concocté par les soins de notre chef pour satisfaire au mieux les plus fins gourmets.</p>
                </div>
            </div>
        </div>
        <div class="divcod20"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Entrées</h4>
                        <div class="tap-inner">
													<?php 
													// Préviens qu'il n'y a aucun article de la catégorie courante...
													$nbrarticle = count($entree);
													if ($nbrarticle < 0) {
														$htmlNoItem  =	"<div>";
														$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
														$htmlNoItem .=	"</div>";
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
														$htmlNoItem  =	"<div>";
														$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
														$htmlNoItem .=	"</div>";
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
                            <div>
                                <p class="prix">9,00 €</p>
                                <p class="plat">Canon de chocolat au cannelloni farci à la vanille</p>
                            </div>
                            <div>
                                <p class="prix">9,00 €</p>
                                <p class="plat">Irish glacé à la crème de ganache chocolatée</p>
                            </div>
                            <div>
                                <p class="prix">8,00 €</p>
                                <p class="plat">Cheese-cake revisité au citron vert et spéculoos, tuile de riz soufflé</p>
                            </div>
                            <div>
                                <p class="prix">9,00 €</p>
                                <p class="plat">Assortiment de fromages AOC </p>
                            </div>
                            <div>
                                <p class="prix">9,00 €</p>
                                <p class="plat">Déclinaison de desserts </p>
                            </div>
                            <div>
                                <p class="prix">8,00 €</p>
                                <p class="plat">Croquant de meringue aux agrumes et crème légère des îles</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordions-style5">
                    <div class="section-content">
                        <h4 class="tap-title active">Suggestions</h4>
                        <div class="tap-inner">
                            <div>
                                <p class="prix">12,00 €</p>
                                <p class="plat">Croquette de parmesan aux tomates confites</p>
                            </div>
                            <div>
                                <p class="prix">12,00 €</p>
                                <p class="plat">Risotto crémeux aux scampis et cardamome</p>
                            </div>
                            <div>
                                <p class="prix">14,00 €</p>
                                <p class="plat">Damier de Saint-Jacques à la crème aigrelette de pamplemousse rose</p>
                            </div>
                            <div>
                                <p class="prix">28,00 €</p>
                                <p class="plat">Ris de veau poêlé aux champignons des bois et morilles, mariné au vin de paille</p>
                            </div>
                            <div>
                                <p class="prix">21,00 €</p>
                                <p class="plat">Tagliata de bar et saumon aux tomates confites, mousseline aux herbes</p>
                            </div>
                            <div>
                                <p class="prix">29,00 €</p>
                                <p class="plat">Filet pur revisité façon Rossini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Accordions -->








	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($pates);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($pates as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($pates[$cle]->nom_fr); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($pates[$cle]->prix); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>




	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($poisson);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($poisson as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($poisson[$cle]->nom_fr); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($poisson[$cle]->prix); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>




	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($viande);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($viande as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($viande[$cle]->nom_fr); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($viande[$cle]->prix); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>




	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($dessert);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($dessert as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($dessert[$cle]->nom_fr); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($dessert[$cle]->prix); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>

