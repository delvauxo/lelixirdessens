<!-- Placeholder for the loader (style it as you wish)-->
<div id="loader2" style="display: none;  position: fixed; top: 50%; left: 50%; z-index: 1234; overflow: auto; text-align:center; width: 400px; height: 500px; margin-left: -200px; margin-top: -176px; "><p>Merci de patienter pendant le chargement de la page</p><img src="http://www.vanandvan.be/nl/webroot/img/loading/loading.gif"></div>
<!-- Div with the id "content" to hide the content before showing the loader...-->
<div  id="content2" style="display:table; border: 2px solid pink; width: 100%; border-spacing: 3px;">

<div class="page-header">
	<h1><?php echo isset($post->file)?'Editer':'Ajouter'; ?> un catalogue :</h1>
	<h5>
		<span class="label important">
			Format imposé
		</span>
		<span style="padding-left: 22px;">
			.PDF
		</span>
	</h5>
</div>

<form action="<?php echo Router::url('admin/catalogues/edit/'.$id); ?>" method="post" enctype="multipart/form-data" onSubmit="uploading();">
	<?php echo $this->Form->input('file','Catalogue',array('type'=>'file')); ?>
	<?php echo $this->Form->input('name','Nom FR'); ?>
	<?php echo $this->Form->input('naam','Nom NL'); ?>	
	<?php echo $this->Form->input('category_id','Usine',array('options' => $categories)); ?>
	<?php echo $this->Form->input('created','Date de création',array('class'=>'datepicker')); ?>
	<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	<?php echo $this->Form->input('id','hidden'); ?>
	<div class="actions">
		<input type="submit" class="btn primary" value="Envoyer">
	</div>
</form>

</div>
