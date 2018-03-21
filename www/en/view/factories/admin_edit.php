<!-- Placeholder for the loader (style it as you wish)-->
<div id="loader2" style="display: none;  position: fixed; top: 50%; left: 50%; z-index: 1234; overflow: auto; text-align:center; width: 400px; height: 500px; margin-left: -200px; margin-top: -176px; "><p>Merci de patienter pendant le chargement de la page</p><img src="http://www.vanandvan.be/nl/webroot/img/loading/loading.gif"></div>
<!-- Div with the id "content" to hide the content before showing the loader...-->
<div  id="content2" style="display:table; border: 2px solid pink; width: 100%; border-spacing: 3px;">

<?php 
if(isset($post->file)){
define('ID_POST',$id); 
echo '<div class="row">';
echo '<div class="span16">';
echo '<div class="clearfix">';
echo '<img src="'.Router::webroot('logofacto/'.$post->file).'" alt="'.$post->file.'" height="150px" style="float: left; border: 1px solid #000; margin-right: 25px; opacity:0.65; filter:alpha(opacity=65);" />';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<br />';
echo '<br />';
}
?>

<div class="page-header">
	<h1><?php echo isset($post->file)?'Editer':'Ajouter'; ?> une usine :</h1>
	<h5>
		<span class="label important">
			Taille recommandée
		</span>
		<span style="padding-left: 22px;">
			largeur : 250px / hauteur : 130px
		</span>
	</h5>
</div>

<form action="<?php echo Router::url('admin/factories/edit/'.$id); ?>" method="post" enctype="multipart/form-data" onSubmit="uploading();">
	<?php echo $this->Form->input('file','Logo',array('type'=>'file')); ?>
	<?php echo $this->Form->input('name','Nom'); ?>
	<?php echo $this->Form->input('country','Pays'); ?>
	<?php echo $this->Form->input('street','Rue'); ?>
	<?php echo $this->Form->input('city','Ville'); ?>
	<?php echo $this->Form->input('phone','Tel'); ?>
	<?php echo $this->Form->input('fax','Fax'); ?>
	<?php echo $this->Form->input('email','E-mail'); ?>
	<?php echo $this->Form->input('website','Website'); ?>
	<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	<?php echo $this->Form->input('id','hidden'); ?>
	<div class="actions">
		<input type="submit" class="btn primary" value="Envoyer">
	</div>
</form>

</div>
