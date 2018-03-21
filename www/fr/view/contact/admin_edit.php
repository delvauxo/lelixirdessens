<?php 

if(isset($post->file)){
define('ID_POST',$id); 
echo '<div class="row">';
echo '<div class="span16">';
echo '<div class="clearfix">';
echo '<img src="'.Router::webroot('slideshow/images/'.$post->file).'" alt="'.$post->file.'" height="150px" style="float: left; border: 1px solid #000; margin-right: 25px; opacity:0.65; filter:alpha(opacity=65);" />';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<br />';
echo '<br />';
}
?>

<div class="page-header">
	<h1><?php echo isset($post->file)?'Editer':'Ajouter'; ?> un slide :</h1>
	<h5>
		<span class="label important">
			Taille recommandée
		</span>
		<span style="padding-left: 22px;">
			largeur : 950px / hauteur : 350px
		</span>
	</h5>
</div>

<form action="<?php echo Router::url('admin/contacts/edit/'.$id); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->Form->input('file','Slide',array('type'=>'file')); ?>
	<?php echo $this->Form->input('caption','Texte'); ?>
	<?php echo $this->Form->input('linkedto','Lien'); ?>
	<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	<?php echo $this->Form->input('id','hidden'); ?>
	<div class="actions">
		<input type="submit" class="btn primary" value="Envoyer">
	</div>
</form>