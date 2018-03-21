<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[1]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[1]->description_for_layout_fr; ?>

<!-- Container box - All
================================================ -->
<div class="grid_12" style="margin-top: 11px;">

<!-- Container box - ENTREES
================================================ -->
<div id="img1"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 5; position: relative;">

<span class="flaticon-restaurant2"></span>
<div class="grid_8" id="actutitleCarte">
	<span>Entrées froides et chaudes</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($entree);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($entree as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($entree[$cle]->nom_fr); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($entree[$cle]->prix); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 ENTREE -->

<!-- Container box - PATES
================================================ -->
<div id="img2"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articlesMenu" style="z-index: 4; position: relative;">

<span class="flaticon-fork12"></span>
<div class="grid_8" id="CarteTitle">
	<span>Pâtes fraîches</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page 
	================================================ -->
	<div class="menuBlockCarte">
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
	</div>
</div> <!-- FIN GRID_8 PATES -->


<!-- Container box - POISSON
================================================ -->
<div id="img3"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articlesMenu" style="z-index: 3; position: relative;">

<span class="flaticon-fish2"></span>
<div class="grid_8" id="CarteTitle2">
	<span>Poissons</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page 
	================================================ -->
	<div class="menuBlockCarte">
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
	</div>
</div> <!-- FIN GRID_8 POISSON -->

<!-- Container box - VIANDE
================================================ -->
<div id="img4"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articlesMenu" style="z-index: 2; position: relative;">

<span class="flaticon-meat4"></span>
<div class="grid_8" id="CarteTitle2">
	<span>Viandes</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page 
	================================================ -->
	<div class="menuBlockCarte">
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
	</div>
</div> <!-- FIN GRID_8 VIANDE -->


<!-- Container box - DESSERT
================================================ -->
<div id="img5"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articlesMenu" style="z-index: 1; position: relative;">

<span class="flaticon-icecream5"></span>
<div class="grid_8" id="CarteTitle2">
	<span>Desserts</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page 
	================================================ -->
	<div class="menuBlockCarte">
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
	</div>
</div> <!-- FIN GRID_8 DESSERT -->

<!-- SIDE BAR - ANCRES SCROLLTO
================================================ -->
<div class="grid_4" id="catsCarte">
<span class="flaticon-cooking5"></span>

	<div class="grid_4" id="actutitleCarte">
		<span>Plan de la carte</span>
		<div>&nbsp;</div>
	</div> 
	<div class="menuCarte">
		<div class="block_cats_carte"><a href="#img1">Entrées froides et chaudes</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img2">Pâtes fraîches</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img3">Poissons</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img4">Viandes</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img5">Desserts</a></div><br/>
	</div>
</div>

</div> <!-- FIN GRID_12 -->
