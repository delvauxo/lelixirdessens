<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[1]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[1]->description_for_layout_fr; ?>

<!-- Container box - All
================================================ -->
<div class="grid_12" style="margin-top: 11px;">

<!-- Container box - News
================================================ -->
<div class="grid_8" id="articles">

<div class="grid_8" id="actutitle">
	<span>les dernière technologies WEB</span>
	<div>&nbsp;</div>
</div>

<!-- Content Page - NewsFeed...
================================================ -->
	<div>

	
	<?php 
	// Préviens qu'il n'y a aucun article de la catégorie courante...
	$nbrarticle = count($posts);
	if ($nbrarticle > 0) {
		echo "&nbsp;";
	}else{
		echo "Désolé il n'y a aucun article de cette catégorie !";
	}
	?>

		<!-- block 3 colonnes -->
		<?php
		foreach($posts as $cle=>$valeur) 
		{
		
		$idPost 		   	= 	$posts[$cle]->id;		// Pour le link Lire la suite
		$slugPost 		 	= 	$posts[$cle]->slug;		// Pour le link Lire la suite


		// Titre & Description Pour Facebook PAS BESOIN
		// ================================================ -->
		// $url_for_fb = $_SERVER['SCRIPT_URI'].'/'.$posts[$cle]->slug.'-'.$posts[$cle]->id;
		// $title_for_fb = $posts[$cle]->name .'  - '.$_SERVER['SERVER_NAME'].'';
		// $description_for_fb = strip_tags($posts[$cle]->content);
		// $thumb_for_fb = 'http://'.$_SERVER['HTTP_HOST'].'/fr/img/'.$posts[$cle]->file;


		// Formatage de la date au format FR
		// ===================================================================== -->
					// recuperation depuis la BdD
					$posts[$cle]->created; // de la forme AAAA-MM-JJ
					// annee, moi, jour
					$annee = date('Y',strtotime($posts[$cle]->created));
					$mois = date('m',strtotime($posts[$cle]->created));
					$jour = date('d',strtotime($posts[$cle]->created));
					// date en francais de la forme JJ/MM/AAAA
					$ladate_fr = date('d-m-Y',strtotime($posts[$cle]->created));
		?>

			<div class="block" onclick="JavaScript:document.location='<?php echo Router::url("posts/view/id:{$idPost}/slug:$slugPost"); ?>'">
				<h2><?php echo ucfirst($posts[$cle]->name); ?></h2>
				<div class="actu_date"><?php echo $ladate_fr; ?></div>
				<img id="actu_thumb" src="<?php echo Router::webroot('img/'.$posts[$cle]->file); ?>">
				<div class="actu_texte"><?php echo substr(strip_tags($posts[$cle]->content),0,250).'...<br/>' ?></div>
				<div class="actu_bottom">
					<div class="actu_cats">
						<!-- Affichage de la Catégorie -->
						<?php if ($posts[$cle]->catslug !== 'aucune') { ?>
						<div>
							<a class="caty" href="<?php echo Router::url('posts/category/slug:'.$posts[$cle]->catslug); ?>" title="Afficher uniquement les produits <?php echo $posts[$cle]->catname; ?>.">
								<?php echo ucfirst($posts[$cle]->catname); ?>
							</a>
						</div>		
						<?php }else{ ?>
						<div>
							<a class="caty" href="<?php echo Router::url('posts/category/slug:'.$posts[$cle]->catslug); ?>" title="Afficher uniquement les produits <?php echo $posts[$cle]->catname; ?>.">
								<?php echo 'Autres'; ?>
							</a>				
						</div>	
						<?php } ?>

					</div>
					<div class="actu_social" style="text-align: right;">

						<!-- Facebook Button -->
						<div class="fb-like" data-href="<?php echo $_SERVER['SERVER_NAME'].Router::url("posts/view/id:{$idPost}/slug:$slugPost"); ?>" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>

						<!-- Twitter Button -->
						<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="<?php echo $_SERVER['SCRIPT_URI']."/".$slugPost."-".$idPost; ?>" data-text="<?php echo ucfirst($posts[$cle]->name); ?>">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

					</div>
				</div>
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
	</div> <!-- FIN DIV PAGINATION -->


	</div>
</div> <!-- FIN GRID_8 -->

<!-- SIDE BAR - CATEGORIES
================================================ -->
<div class="grid_4" id="cats">

	<div class="grid_4" id="catstitle">
		<span>Catégories</span>
		<div>&nbsp;</div>
	</div>

	<div class="block_cats">
	<a class="first_cats" href='/fr/actualite'>Toutes</a><br/>

	<?php 
	foreach ($categories as &$value) {
		// On retire la fausse CAT 'AUCUNE'
		if ($value !== 'Aucune') {
			if (preg_match("/\bcategory\b/i", $_SERVER[SCRIPT_URI] )) {
				echo "<a href='".strtolower(str_replace(' ', '-', $value))."'>".$value."<br/>";
			}else{
				echo "<a href='category/".strtolower(str_replace(' ', '-', $value))."'>".$value."<br/>";
			}
		}
	}  		// --> ENDFOREACH CATEGORIES (SIDEBAR)
	?>
	</div>
</div>

</div> <!-- FIN GRID_12 -->
