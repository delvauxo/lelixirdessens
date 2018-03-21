<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[2]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[2]->description_for_layout_fr; ?>


<!-- Style box
================================================ -->
<div class="grid_12">

<!-- Content Page - Services...
================================================ -->
<div>
	<!-- DIV - Titre Description -->
	<div class="grid_12" id="section_title">
		<span>Nos Services</span>
		<div>&nbsp;</div>
		<b><p style="font-family: 'Arial'; font-size: 16px; margin-top: 22px;">Conjuguez la richesse du contenu à la personnalisation du design pour un site web de qualité</p></b>
		<p style="font-family: 'arial'; font-size: 14px; color: #848484; line-height: 120%; text-align: justify; margin-top: 11px; margin-bottom: 22px;">Une équipe polyvalente, une créativité débordante, un professionnalisme hors pair, une expertise unique… Le cocktail idéal pour créer un site web ergonomique, original et de qualité. Pour faire sensation auprès de vos clients, une seule solution : MicroWeb, à Bruxelles ! Nous assurons la prise en charge et la création de votre site Internet de A à Z grâce aux services suivants</p>
		<div>&nbsp;</div>
	</div>

	<!-- block 3 colonnes -->
	<?php
	foreach($services as $cle=>$valeur) 
	{
				$idPost 		   	= 	$services[$cle]->id;		// Pour le link Lire la suite
				$slugPost 		 	= 	$services[$cle]->slug;		// Pour le link Lire la suite

	// Formatage de la date au format FR
	// ===================================================================== -->
				// recuperation depuis la BdD
				$services[$cle]->created; // de la forme AAAA-MM-JJ
				// annee, moi, jour
				$annee = date('Y',strtotime($services[$cle]->created));
				$mois = date('m',strtotime($services[$cle]->created));
				$jour = date('d',strtotime($services[$cle]->created));
				// date en francais de la forme JJ/MM/AAAA
				$ladate_fr = date('d-m-Y',strtotime($services[$cle]->created));
	
	?>

	<div class="srv_main_content">
		<!-- Image
		================================================ -->	
		<img class="srv_thumb" src="<?php echo Router::webroot('img/services/'.$services[$cle]->file); ?>">
		<!-- Titre
		================================================ -->	
		<h2 class="srv_title"><?php echo ucfirst($services[$cle]->titre_fr); ?></h2>
		<!-- Contenu - texte
		================================================ -->	
		<p class="srv_text"><?php echo strip_tags($services[$cle]->texte_fr).'<br/>' ?></p>
	</div>

	<?php												
	} 		// FIN CONTENU HOME PAGE (INFOS FORMULAIRE) --> ENDFOREACH
	?>


<!-- Pagination
================================================ 
<div class="pagination">
  <ul>
  <?php for($i=1; $i <= $page; $i++): ?>
    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
  </ul>
</div>--> <!-- FIN PAGINATION -->


</div>

</div><!-- FIN CITATION STYLE -->

