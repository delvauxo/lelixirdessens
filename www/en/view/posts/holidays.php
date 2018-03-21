<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[7]->title_for_layout_en; ?>
<?php $description_for_layout = $parametres[7]->description_for_layout_en; ?>

<!-- Container box - All
================================================ -->
<div class="grid_12" style="margin-top: 11px;">

<!-- Container box - ENTREES
================================================ -->
<div class="grid_8" id="articles" style="z-index: 5; position: relative;">

<span class="flaticon-couple39_1"></span>
<div class="grid_8" id="actutitleCarte">
	<span>Drinks included</span>
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
		$htmlNoItem .=	"Sorry there is no drink !";
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
			<div class="blockCarteNom"><?php echo ucfirst($boisson[$cle]->nom_en); ?></div>
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
	<span>Starters</span>
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
		$htmlNoItem .=	"Sorry there is no starter !";
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
			<div class="blockCarteNom"><?php echo ucfirst($entree[$cle]->nom_en); ?></div>
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
	<span>Main Dish</span>
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
		$htmlNoItem .=	"Sorry there is no main dish !";
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
			<div class="blockCarteNom"><?php echo ucfirst($plat[$cle]->nom_en); ?></div>
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
		$htmlNoItem .=	"Sorry there is no dessert !";
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
			<div class="blockCarteNom"><?php echo ucfirst($dessert[$cle]->nom_en); ?></div>
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
		<span style="color: #820000;"><?php echo $prix[1]->nom_en; ?></span><span> Price</span>
		<div>&nbsp;</div>
	</div> 
	<div class="menuCarte2">
		<div class="block_cats_carte">
			<div style="float: left;">Full Menu</div>
			<div style="float: right; padding-right: 15px;">
				<?php echo $prix[1]->prix.'&nbsp;€'; ?>
			</div>
		</div>

		<?php 
		// Si le prix sans dessert est plus grand que 0 alors l'afficher
		if ($prix[1]->prix_ss_dessert > 0) {
			$htmlNoItem  =	"<br/>";
			$htmlNoItem .=	"<div class='block_cats_carte' style='margin-top: -19px;'>";
			$htmlNoItem .=	"<div style='float: left;'>Menu without dessert</div>";
			$htmlNoItem .=	"<div style='float: right; padding-right: 15px;'>";
			$htmlNoItem .=	$prix[1]->prix_ss_dessert.'&nbsp;€';
			$htmlNoItem .=	"</div>";
			$htmlNoItem .=	"</div>";
			echo $htmlNoItem;
		}
		 ?>

		<?php
		// Si le prix sans entrée est plus grand que 0 alors l'afficher
		if ($prix[1]->prix_ss_entree > 0) {
			$htmlNoItem  =	"<br/>";
			$htmlNoItem .=	"<div class='block_cats_carte' style='margin-top: -19px;'>";
			$htmlNoItem .=	"<div style='float: left;'>Menu without starter</div>";
			$htmlNoItem .=	"<div style='float: right; padding-right: 15px;'>";
			$htmlNoItem .=	$prix[1]->prix_ss_entree.'&nbsp;€';
			$htmlNoItem .=	"</div>";
			$htmlNoItem .=	"</div>";
			echo $htmlNoItem;
		}
		 ?>

		<br/>
	</div>
</div>

</div> <!-- FIN GRID_12 -->
