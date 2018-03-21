<!-- Titre du layout
================================================ -->
<?php $title_for_layout = 'Micro-Web.be - Services' ?>


<!-- Content Page - NewsFeed...
================================================ -->
<div>
	<div style="margin-left: 10px;">
		<h2 id="section_titre_page">Services :</h2>
		<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>" style="margin-left: -15px;" />
	</div>
	<p id="section_texte_page" style="margin-right: 10px;">
			<?php echo $services[0]->texte_fr; ?>
	</p>
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
		
	<div class="block_home"><h2><?php echo ucfirst($services[$cle]->name); ?></h2>

							<!-- Affichage de la Catégorie -->
							<?php if ($services[$cle]->catslug !== 'aucune') { ?>
							<div>
								<div id="date"><?php echo $ladate_fr.'&nbsp;-&nbsp;'; ?></div>
								<a style="float:left;" href="<?php echo Router::url('services/category/slug:'.$services[$cle]->catslug); ?>" title="Afficher uniquement les produits <?php echo $services[$cle]->catname; ?>.">
									<?php echo ucfirst($services[$cle]->catname); ?>
								</a>
							</div>		
							<?php }else{ ?>
							<div>
								<div id="date"><?php echo $ladate_fr; ?></div>
							</div>	
							<?php } ?>

							<img id="actu_thumb" src="<?php echo Router::webroot('img/'.$services[$cle]->file); ?>">
							<p class="post"><?php echo substr(strip_tags($services[$cle]->content),0,250).'...<br/>' ?></p>
							<p style="text-align: right;"><a href="<?php echo Router::url("services/view/id:{$idPost}/slug:$slugPost"); ?>" title="en savoir plus">en savoir plus...</a></p>
	</div>
		

	<?php												
	} 		// FIN CONTENU HOME PAGE (INFOS FORMULAIRE) --> ENDFOREACH
	?>


<!-- Pagination
================================================ -->
<div class="pagination">
  <ul>
  <?php for($i=1; $i <= $page; $i++): ?>
    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
  </ul>
</div> <!-- FIN PAGINATION -->


</div>
