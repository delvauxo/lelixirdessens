<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[3]->title_for_layout_en; ?>
<?php $description_for_layout = $parametres[3]->description_for_layout_en; ?>

<!-- Container box - All
================================================ -->
<div class="grid_12" style="margin-top: 11px;">

<!-- Container box - SUGGESTIONS DU MOIS
================================================ -->
<div id="img1"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 6; position: relative;">

<span class="flaticon-couple39_1"></span>
<div class="grid_8" id="actutitleCarte">
	<span>Suggestions of the month</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($suggestion);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Sorry there is no suggestion !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>
	<div class="blockCarteHead" style="height: 33px;">
		<div style="float: right; width: 50px; margin-top: -3px; text-align: center; display: none;">1 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center;">3/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center;">1/2 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 15px; text-align: center; display: none;">1/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 15px; text-align: center; display: none;">Glass</div>
	</div>

	<!-- FOREACH block -->
	<?php
	foreach($suggestion as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNomSuggestion"><?php echo ucfirst($suggestion[$cle]->nom); ?></div>
			<?php 
			// Si demi vaut pas 0.00 alors afficher le prix du demi
			if ($suggestion[$cle]->demi != 0.00) {
				$htmlDemi = '<div class="blockCarteDemi">';
				$htmlDemi .= $suggestion[$cle]->demi.'&nbsp;&euro;';
				$htmlDemi .= '</div>';
				echo $htmlDemi;
			}else{ 
			// Sinon afficher "-" au lieu du demi
				$htmlDemi = '<div class="blockCarteNoDemi">';
				$htmlDemi .= '-';
				$htmlDemi .= '</div>';
				echo $htmlDemi;
			} ?>

			<?php 
			if ($suggestion[$cle]->entier != 0.00) {
			// Si demi vaut pas 0.00 alors afficher le prix de l'entier
				$htmlEntier = '<div class="blockCarteEntier">';
				$htmlEntier .= $suggestion[$cle]->entier.'&nbsp;&euro;';
				$htmlEntier .= '</div>';
				echo $htmlEntier;
			}else{ 
			// Sinon afficher "-" au lieu de l'entier
				$htmlEntier = '<div class="blockCarteNoEntier">';
				$htmlEntier .= '-';
				$htmlEntier .= '</div>';
				echo $htmlEntier;
			} ?>
		</div>
	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 ENTREE -->

<!-- Container box - VINS DU PATRON
================================================ -->
<div id="img2"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 5; position: relative;">

<span class="flaticon-couple39_2"></span>
<div class="grid_8" id="CarteTitle3">
	<span>House Wine</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<div class="blockCarteHead">
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center;">1 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center; display: none;">3/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center;">1/2 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center;">1/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center;">Glass</div>
	</div>
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($patron);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Sorry there is no Patron wine !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>

	<!-- FOREACH block -->
	<?php
	foreach($patron as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNomPatron"><?php echo ucfirst($patron[$cle]->nom); ?></div>
			<?php 
			// Si verre vaut pas 0.00 alors afficher le prix du verre
			if ($patron[$cle]->verre != 0.00) {
				$html  = '<div class="blockCarteVerre">';
				$html .= $patron[$cle]->verre.'&nbsp;&euro;';
				$html .= '</div>';
				echo $html;
			}else{ 
			// Sinon afficher "-" au lieu du verre
				$html  = '<div class="blockCarteNoVerre">';
				$html .= '-';
				$html .= '</div>';
				echo $html;
			} ?>
			<?php 
			// Si quart vaut pas 0.00 alors afficher le prix du quart
			if ($patron[$cle]->quart != 0.00) {
				$html  = '<div class="blockCarteQuart">';
				$html .= $patron[$cle]->quart.'&nbsp;&euro;';
				$html .= '</div>';
				echo $html;
			}else{ 
			// Sinon afficher "-" au lieu du quart
				$html  = '<div class="blockCarteNoQuart">';
				$html .= '-';
				$html .= '</div>';
				echo $html;
			} ?>
			<?php 
			// Si demi vaut pas 0.00 alors afficher le prix du demi
			if ($patron[$cle]->demi != 0.00) {
				$html  = '<div class="blockCarteDemi">';
				$html .= $patron[$cle]->demi.'&nbsp;&euro;';
				$html .= '</div>';
				echo $html;
			}else{ 
			// Sinon afficher "-" au lieu du demi
				$html  = '<div class="blockCarteNoDemi">';
				$html .= '-';
				$html .= '</div>';
				echo $html;
			} ?>
			<?php 
			// Si litre vaut pas 0.00 alors afficher le prix du litre
			if ($patron[$cle]->litre != 0.00) {
				$html  = '<div class="blockCarteLitre">';
				$html .= $patron[$cle]->litre.'&nbsp;&euro;';
				$html .= '</div>';
				echo $html;
			}else{ 
			// Sinon afficher "-" au lieu du litre
				$html  = '<div class="blockCarteNoLitre">';
				$html .= '-';
				$html .= '</div>';
				echo $html;
			} ?>
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 PATES -->


<!-- Container box - VIN ROUGE
================================================ -->
<div id="img3"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 4; position: relative;">

<span class="flaticon-couple39_2"></span>
<div class="grid_8" id="CarteTitle3">
	<span>Red Wine</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<div class="blockCarteHead">
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center; display: none;">1 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center;">3/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/2 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">Glass</div>
	</div>
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($rouge);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Sorry there is no Red wine !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>
	<!-- FOREACH block -->
	<?php
	foreach($rouge as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($rouge[$cle]->nom); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($rouge[$cle]->entier); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 VIN ROUGE -->

<!-- Container box - VIN ROUGE
================================================ -->
<div id="img4"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 3; position: relative;">

<span class="flaticon-couple39_2"></span>
<div class="grid_8" id="CarteTitle3">
	<span>White wine</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<div class="blockCarteHead">
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center; display: none;">1 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center;">3/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/2 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">Glass</div>
	</div>
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($blanc);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Sorry there is no White wine !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>
	<!-- FOREACH block -->
	<?php
	foreach($blanc as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($blanc[$cle]->nom); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($blanc[$cle]->entier); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 VIANDE -->


<!-- Container box - DESSERT
================================================ -->
<div id="img5"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 2; position: relative;">

<span class="flaticon-couple39_2"></span>
<div class="grid_8" id="CarteTitle3">
	<span>Rosé Wine</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<div class="blockCarteHead">
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center; display: none;">1 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center;">3/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/2 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">Glass</div>
	</div>
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($rose);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Sorry there is no Rosé wine !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>
	<!-- FOREACH block -->
	<?php
	foreach($rose as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($rose[$cle]->nom); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($rose[$cle]->entier); ?>&nbsp;&euro;</div>	
		</div>

	<?php												
	} 		// --> ENDFOREACH
	?>
	</div>
</div> <!-- FIN GRID_8 DESSERT -->


<!-- Container box - DESSERT
================================================ -->
<div id="img6"></div><!-- Ancre SCROLLTO -->
<div class="grid_8" id="articles" style="z-index: 1; position: relative;">

<span class="flaticon-couple39_2"></span>
<div class="grid_8" id="CarteTitle3">
	<span>Champagne & Prosecco</span>
	<div>&nbsp;</div>
</div>

	<!-- Content Page - NewsFeed...
	================================================ -->
	<div class="menuBlockCarte">
	<div class="blockCarteHead">
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center; display: none;">1 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 0px; text-align: center;">3/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/2 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">1/4 L</div>
		<div style="float: right; width: 50px; margin-top: -3px; padding-right: 30px; text-align: center; display: none;">Glass</div>
	</div>
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($champagne);
	if ($nbrarticle < 0) {
		$htmlNoItem  =	"<div class='blockCarte' style='margin-top: 70px; text-align: center; height: 33px;'>";
		$htmlNoItem .=	"Sorry there is no Champagne !";
		$htmlNoItem .=	"</div>";
		echo $htmlNoItem;
	}
	?>
	<!-- FOREACH block -->
	<?php
	foreach($champagne as $cle=>$valeur) 
	{
	?>

		<div class="blockCarte">
			<div class="blockCarteNom"><?php echo ucfirst($champagne[$cle]->nom); ?></div>
			<div class="blockCartePrix"><?php echo ucfirst($champagne[$cle]->entier); ?>&nbsp;&euro;</div>	
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
		<span>Plan Menu</span>
		<div>&nbsp;</div>
	</div> 
	<div class="menuCarte">
		<div class="block_cats_carte"><a href="#img1">Suggestions of the month</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img2">House Wine</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img3">Red Wine</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img4">White Wine</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img5">Rosé Wine</a></div><br/>
		<div class="block_cats_carte" style="margin-top: -19px;"><a href="#img6">Champagne & Prosecco</a></div><br/>
	</div>
</div>

</div> <!-- FIN GRID_12 -->
