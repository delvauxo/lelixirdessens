<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = 'Login - Micro-Web.be'; ?>
<?php $description_for_layout = 'Login to Micro-Web.be'; ?>


<!-- Content Page - A Propos text...
================================================ -->
<div>
	<div style="margin-left: 10px;">
		<h2 id="section_titre_page">Zone réservée :</h2>
		<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>" style="margin-left: -15px;" />
	</div>
	<div id="section_texte_page">
		<form action="<?php echo Router::url('users/login'); ?>" method="post" enctype="multipart/form-data">
			<?php echo $this->FormFront->input('login','Identifiant'); ?>
			<?php echo $this->FormFront->input('password','Mot de passe',array('type'=>'password')); ?>
			<div class="actions">
				<input type="submit" class="btn primary" value="Se connecter">
			</div>
		</form>
	</div>
</div>