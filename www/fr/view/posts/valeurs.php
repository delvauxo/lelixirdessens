<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[3]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[3]->description_for_layout_fr; ?>


<!-- Style box
================================================ -->
<div class="grid_12">

<!-- Content Page - Services...
================================================ -->
<div>
	<!-- DIV - Titre Description -->
	<div class="grid_12" id="section_title">
		<span>MicroWeb la plus-value de votre site web</span>
		<div>&nbsp;</div>
		<b><p style="font-family: 'Arial'; font-size: 16px; margin-top: 22px;">Conjuguez la richesse du contenu à la personnalisation du design pour un site web de qualité</p></b>
		<p style="font-family: 'arial'; font-size: 14px; color: #848484; line-height: 120%; text-align: justify; margin-top: 11px; margin-bottom: 22px;">Agence web située à Bruxelles et unique en Belgique, MicroWeb met son savoir-faire polyvalent et ses connaissances approfondies au service des petites entreprises désireuses de bénéficier d’un site web de qualité. En tant que professionnels aguerris et multilingues, nous proposons la déclinaison de votre site dans différentes langues . Une solution idéale pour toucher votre cible en plein cœur. Collaborez avec MicroWeb et bénéficiez, en outre, de quatre avantages de taille :</p>
		<div>&nbsp;</div>
	</div>

	<!-- block 3 colonnes -->
	<?php
	foreach($valeurs as $cle=>$valeur) 
	{
				$idPost 		   	= 	$valeurs[$cle]->id;		// Pour le link Lire la suite
				$slugPost 		 	= 	$valeurs[$cle]->slug;		// Pour le link Lire la suite

	// Formatage de la date au format FR
	// ===================================================================== -->
				// recuperation depuis la BdD
				$valeurs[$cle]->created; // de la forme AAAA-MM-JJ
				// annee, moi, jour
				$annee = date('Y',strtotime($valeurs[$cle]->created));
				$mois = date('m',strtotime($valeurs[$cle]->created));
				$jour = date('d',strtotime($valeurs[$cle]->created));
				// date en francais de la forme JJ/MM/AAAA
				$ladate_fr = date('d-m-Y',strtotime($valeurs[$cle]->created));
	
	?>

	<div class="srv_main_content">
		<!-- Image
		================================================ -->	
		<img class="srv_thumb" src="<?php echo Router::webroot('img/valeurs/'.$valeurs[$cle]->file); ?>">
		<!-- Titre
		================================================ -->	
		<h2 class="srv_title"><?php echo ucfirst($valeurs[$cle]->titre_fr); ?></h2>
		<!-- Contenu - texte
		================================================ -->	
		<p class="srv_text"><?php echo strip_tags($valeurs[$cle]->texte_fr).'<br/>' ?></p>
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

