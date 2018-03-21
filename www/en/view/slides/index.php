<?php $title_for_layout = 'Actualit&eacute;s - VanAndVan' ?>

	<?php 	// DEBUT SLIDESHOW ?>
	<div class="flexslider">
	<ul class="slides">
		<?php
			foreach($slides as $cle=>$valeur) 
			{
				$s		= $slides[$cle]->file;						
				$linkedTo	= $slides[$cle]->linkedto;					
				$caption	= $slides[$cle]->caption;				

				?>
				<li class="rounded-shadow">
				<a href="<?php echo $linkedTo; ?>">
				<img width="100%" height="350px" src="<?php  echo Router::webroot('slideshow/images/'.$s); ?>" />
				</a>
				<p class="flex-caption"><?php echo ucfirst($caption); ?></p>
				</li>
				<?php
			}
	?>
	</ul>
	</div>
	<?php 	// FIN SLIDESHOW ?>

<div style="margin: 40px 0 10px; font-family: Verdana; font-size: 22px;">Actualités</div>

<!-- LIGNE DE SEPARATION -->
<img style="width: 960px; height: 2px; margin-bottom: 50px; margin-left: -10px;" src="<?php echo Router::webroot('img/layout/under_actu_2.png'); ?>">

<?php 	// DEBUT CONTENU HOME PAGE (INFOS FORMULAIRE) --> FOREACH

foreach($posts as $cle=>$valeur) 
{
			$idPost 		   	= 	$posts[$cle]->id;		// Pour le link Lire la suite
			$slugPost 		 	= 	$posts[$cle]->slug;		// Pour le link Lire la suite

?>

<?php
// FORMATAGE DE MA DATE "FR"

// recuperation depuis la BdD
$posts[$cle]->created; // de la forme AAAA-MM-JJ
// annee, moi, jour
$annee = date('Y',strtotime($posts[$cle]->created));
$mois = date('m',strtotime($posts[$cle]->created));
$jour = date('d',strtotime($posts[$cle]->created));
// date en francais de la forme JJ/MM/AAAA
$ladate_fr = date('d-m-Y',strtotime($posts[$cle]->created));
?>

			<div style="width: 980px; margin-bottom: 20px; height: 235px; max-height: 230px;  border: 0px solid lightgrey; float: left; line-height: 130%; font-size: 14px; font-family: Verdana; margin-left: 0px;">
			
			<a style="float: right;" href="<?php echo Router::url("posts/view/id:{$idPost}/slug:$slugPost"); ?>">
				<img class="flexsliderss" style="float: left;" width="350px" height="218px" src="<?php echo Router::webroot('img/'.$posts[$cle]->file); ?>">
			</a>
			
			<div class="rounded-shadow" style="text-align: justify; width: 535px; height: 186px; min-height: 186px; max-height: 186px; float: left; margin-left: 25px; padding: 20px;">

			<span style="float: left;" title="<?php echo ucfirst($posts[$cle]->name); ?>">
				<a href="<?php echo Router::url("posts/view/id:{$idPost}/slug:$slugPost"); ?>">
				<?php
				 if (strlen($posts[$cle]->name) > 60 ) {
			     	echo ucfirst(substr($posts[$cle]->name, 0, 60)).'...';
				}else{
					echo ucfirst($posts[$cle]->name);
				}
				?>
				</a>
			</span><br/>

			<span style="float: right; margin-top: -18px;">
				<a href="<?php echo Router::url('posts/category/slug:'.$posts[$cle]->catslug); ?>" title="Afficher uniquement les produits <?php echo $posts[$cle]->catname; ?>.">
				<?php
				echo ucfirst($posts[$cle]->catname);
				?>
				</a>
			</span>

			<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>"><br /><br />

			<?php
			echo $ladate_fr.'<br /><br />';
			echo ucfirst(substr(strip_tags($posts[$cle]->content),0,250)).'...<br />';
			?>

			<a style="float: right;" href="<?php echo Router::url("posts/view/id:{$idPost}/slug:$slugPost"); ?>">Lire la suite &rarr;</a>
		</div>
			</div>

<?php												
} 		// FIN CONTENU HOME PAGE (INFOS FORMULAIRE) --> ENDFOREACH
?>

<div class="pagination"> <!-- PAGINATION -->
  <ul>
  <?php for($i=1; $i <= $page; $i++): ?>
    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
  </ul>
</div><!-- FIN PAGINATION -->