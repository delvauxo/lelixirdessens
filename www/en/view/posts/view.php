<!-- Url actuelle
================================================ -->
<?php 	$currentUrl = (url_actuelle()) ; ?>


<!-- Titre & Description du Layout
================================================ -->
<?php $title_for_layout = $post->name .'  - '.$_SERVER['SERVER_NAME'].''; ?>
<?php $description_for_layout = strip_tags($post->content); ?>


<!-- Titre & Description Pour Facebook
================================================ -->
<?php 
$url_for_fb = $_SERVER['SCRIPT_URI'];
$title_for_fb = $post->name .'  - '.$_SERVER['SERVER_NAME'].'';
$description_for_fb = strip_tags($post->content);
$thumb_for_fb = 'http://'.$_SERVER['HTTP_HOST'].'/fr/img/'.$post->file;
?>


<!-- Permet le Retour en arrière
================================================ -->
<?php $nomPageOrigine = $_SERVER["HTTP_REFERER"]; ?>


<!-- Crée le dossier thumbs pour la function CreerMiniature
================================================ -->
<?php 
$dir = WEBROOT.DS.'img'.DS.$post->id.'/thumbs'; 
if(!file_exists(WEBROOT.DS.'img'.DS.$post->id)) mkdir(WEBROOT.DS.'img'.DS.$post->id, 0777); 
if(!file_exists($dir)) mkdir($dir,0777); 
?>


<?php 
// Formatage de la date au format FR
// ===================================================================== -->
// recuperation depuis la BdD
$post->created; // de la forme AAAA-MM-JJ
// annee, moi, jour
$annee = date('Y',strtotime($post->created));
$mois = date('m',strtotime($post->created));
$jour = date('d',strtotime($post->created));
// date en francais de la forme JJ/MM/AAAA
$ladate_fr = date('d-m-Y',strtotime($post->created));
 ?>


<!-- Récupération de l'adresse de l'image pour pouvoir l'afficher aux dimensions originale 
====================================================================== -->
<?php $grandeSize = array(explode('.', $post->file)); ?>


<div class="grid_12 readmorepage" style="margin-top: 11px;">
<!-- Contenu du Lire la suite... (Description, Photos,...)
================================================ -->
<!-- DIV - Titre Description -->
<div class="grid_12" id="section_title">
	<div>&nbsp;</div>
</div>
<div>
	<!-- Titre de l'article -->
	<div>
		<center>
			<span>
				<h2 class="rmtitle">
					<?php echo $post->name; ?><br/>
				</h2> 
				<div class="rmundertitle">
					<small>
						<!-- Date de l'article -->
						<span><?php echo $ladate_fr.'&nbsp;-&nbsp;'; ?></span>
						<!-- Catégorie de l'article -->
						<?php if ($post->catslug !== 'autre') { ?>
						<a class="rmcaty" href="<?php echo Router::url('posts/category/slug:'.$post->catslug); ?>" title="Afficher uniquement les articles <?php echo $post->catname; ?>.">
							<?php echo $post->catname; ?>
						</a>									
						<?php } ?>
					</small>						
				</div>
			</span>
		</center>
	</div>
	<!-- Illustration de l'article -->
	<center>
		<div class="borderpic">
			<a class="zoombox zgallery1" href="<?php echo Router::webroot('img/'.$grandeSize[0][0].'_FullImage'.'.'.$grandeSize[0][1]); ?>">
				<img class="rmpic" src="<?php echo Router::webroot('img/'.$post->file); ?>"/>
			</a>
		</div>
	</center>
	<!-- Contenu Texte -->
	<div class="rmtext">
		<?php echo $post->content; ?>
	</div>
</div>					
<!-- DIV - Titre Photos
<div id="section_photo">
	Photos :
</div>
Soulignement du titre Photos
<img src="<?php echo Router::webroot('img/layout/oziks_pics_post_underline.png'); ?>" style="width: 392px; height: 2px; margin-left: 5px;" />
Affichage des photos miniatures liées à l'article
<?php afficherImages("./img/".$post->id.'/'); ?>
-->


<!-- DIVIDER LINE -->
<div class="grid_12" id="section_title" style="margin-top: 22px;">
	<div>&nbsp;</div>
</div>

<div class="rmsocial">
<!-- Facebook Button -->
<div class="fb-like" data-href="<?php echo $_SERVER['SCRIPT_URI']; ?>" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div>
<!-- Twitter Button -->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-url="<?php echo $_SERVER['SCRIPT_URI']; ?>" data-text="<?php echo ucfirst($post->name); ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Lien "Retour" -->
<a class="rmback" href="<?php echo $nomPageOrigine; ?>">
	&larr;&nbsp;retour
</a>
</div>

</div>

