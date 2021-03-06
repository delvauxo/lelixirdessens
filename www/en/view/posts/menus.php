<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[2]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[2]->description_for_layout_fr; ?>

<!-- Container box - All
================================================ -->
<div class="grid_12" style="margin-top: 11px;">

<!-- Container box - ENTREES
================================================ -->
<div class="grid_8" id="articles" style="z-index: 5; position: relative;">

<span class="flaticon-couple39_1"></span>
<div class="grid_8" id="actutitleCarte">
	<span>Boissons Comprises</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($boisson);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune boisson !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($boisson as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($boisson[$cle]->nom); ?></div>
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 -->

<!-- Container box - ENTREES
================================================ -->
<div class="grid_8" id="articlesMenu" style="z-index: 4; position: relative;">

<span class="flaticon-restaurant20"></span>
<div class="grid_8" id="CarteTitle4">
	<span>Choix d'Entrées</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page 
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
			<div class="blockCarteNom"><?php echo ucfirst($entree[$cle]->nom); ?></div>
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 PATES -->


<!-- Container box - PLATS
================================================ -->
<div class="grid_8" id="articlesMenu" style="z-index: 3; position: relative;">

<span class="flaticon-restaurant20"></span>
<div class="grid_8" id="CarteTitle2">
	<span>Choix de Plats</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page 
	================================================ -->
	<div class="menuBlockCarte">
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($plat);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Désolé il n'y a aucune entrée !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($plat as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($plat[$cle]->nom); ?></div>
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 POISSON -->

<!-- Container box - DESSERTS
================================================ -->
<div class="grid_8" id="articlesMenu" style="z-index: 2; position: relative;">

<span class="flaticon-icecream5"></span>
<div class="grid_8" id="CarteTitle2">
	<span>Choix de Desserts</span>
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
		$htmlNoItem .=	"Désolé il n'y a aucun dessert !";
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
			<div class="blockCarteNom"><?php echo ucfirst($dessert[$cle]->nom); ?></div>
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 VIANDE -->

<!-- SIDE BAR - ANCRES SCROLLTO
================================================ -->
<div class="grid_4" id="catsCarte">
<span class="flaticon-cooking5"></span>

	<div class="grid_4" id="actutitleCarte">
		<span>Prix du menu</span>
		<div>&nbsp;</div>
	</div> 
	<div class="menuCarte2">
		<div class="block_cats_carte">
			<div style="float: left;">Menu Complet</div>
			<div style="float: right; padding-right: 15px;">
				<?php echo $prix[0]->prix.'&nbsp;€'; ?>
			</div>
		</div>
		<br/>
		<div class="block_cats_carte" style="margin-top: -19px;">
			<div style="float: left;">Menu sans Dessert</div>
			<div style="float: right; padding-right: 15px;">
				<?php echo $prix[0]->prix_ss_dessert.'&nbsp;€'; ?>
			</div>
		</div>
		<br/>
		<div class="block_cats_carte" style="margin-top: -19px;">
			<div style="float: left;">Menu sans Entrée</div>
			<div style="float: right; padding-right: 15px;">
				<?php echo $prix[0]->prix_ss_entree.'&nbsp;€'; ?>
			</div>
		</div>
		<br/>
	</div>
</div>

</div> <!-- FIN GRID_12 -->
