<!-- Placeholder for the loader (style it as you wish)-->
<div id="loader2" style="display: none;  position: fixed; top: 50%; left: 50%; z-index: 1234; overflow: auto; text-align:center; width: 400px; height: 500px; margin-left: -200px; margin-top: -176px; "><p>Merci de patienter pendant le chargement de la page</p><img src="http://www.vanandvan.be/nl/webroot/img/loading/loading.gif"></div>
<!-- Div with the id "content" to hide the content before showing the loader...-->
<div  id="content2" class="box" style="display:table;">

<div style="padding: 20px;">
	<h1><span class="edit">&#x41;</span><?php echo isset($post->file_tmb)?'Editer':'Ajouter'; ?> un slide :</h1>

	<form action="<?php echo Router::url('admin/slides/edit/'.$id); ?>" method="post" enctype="multipart/form-data" onSubmit="uploading();">
	<!-- Collapse FORM
	================================================== -->
	<div class="accordion" id="accordion2" style="width: 100%;">
	  <div class="accordion-group">
	    <div class="accordion-heading">
	    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseZero">
	      <span class="illustration">&#xe008;</span>
	      <span class="titleslide">Titre</span>
	      <span class="slidedown">&#xe005;</span>
	    </a>
	    </div>
	    <div id="collapseZero" class="accordion-body collapse in">
	      <div class="accordion-inner">
			<?php echo $this->Form->input('titre','Titre'); ?>
	      </div>
	    </div>
	  </div>
	  <div class="accordion-group">
	    <div class="accordion-heading">
	    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
	      <span class="illustration">&#x57;</span>
	      <span class="titleslide">Slide</span>
	      <span class="slidedown">&#xe005;</span>
	    </a>
	    </div>
	    <div id="collapseOne" class="accordion-body collapse">
	      <div class="accordion-inner">
	      	<div class="picinfo">
				<span class="picsize">
				&#x2e;
				</span>
				<span style="padding-left: 15px;">
					<b>Taille recommandée</b>
				</span>
				<span style="padding-left: 15px; font-style: italic;">
				largeur : <b>960px</b> / hauteur : <b>350px</b>
				</span>
			</div>
			<?php echo $this->Form->input('file','Slide',array('type'=>'file')); ?>
	      </div>
	    </div>
	  </div>
	  <div class="accordion-group">
	    <div class="accordion-heading">
	    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
	      <span class="illustration">&#xe00f;</span>
	      <span class="titleslide">Légende</span>
	      <span class="slidedown">&#xe005;</span>
	    </a>
	    </div>
	    <div id="collapseTwo" class="accordion-body collapse">
	      <div class="accordion-inner">
			<?php echo $this->Form->input('caption','Texte FR'); ?>
			<?php echo $this->Form->input('caption_nl','Texte NL'); ?>
	      </div>
	    </div>
	  </div>
	  <div class="accordion-group">
	    <div class="accordion-heading">
	    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
	      <span class="illustration">&#x70;</span>
	      <span class="titleslide">Lien</span>
	      <span class="slidedown">&#xe005;</span>
	    </a>
	    </div>
	    <div id="collapseThree" class="accordion-body collapse">
	      <div class="accordion-inner">
			<?php echo $this->Form->input('linkedto','Lien FR'); ?>
			<?php echo $this->Form->input('linkedto_nl','Lien NL'); ?>
	      </div>
	    </div>
	  </div>
	  <div class="accordion-group">
	    <div class="accordion-heading">
	    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
	      <span class="illustration">&#x60;</span>
	      <span class="titleslide">En ligne</span>
	      <span class="slidedown">&#xe005;</span>
	    </a>
	    </div>
	    <div id="collapseFour" class="accordion-body collapse">
	      <div class="accordion-inner">
			<?php echo $this->Form->input('online','En ligne',array('type'=>'checkbox')); ?>
	      </div>
	    </div>
	  </div>
	</div>

	
    <?php echo $this->Form->input('id','hidden'); ?>

      <div style="text-align: left; float: left;">
        <button type="button" onclick="JavaScript:document.location='<?php echo Router::url('admin/posts/index'); ?>'">Prévisualiser</button>
      </div>
      <div style="text-align: right;">
        <button type="submit">Enregistrer</button>
        <button type="button" onclick="JavaScript:document.location='<?php echo Router::url('admin/slides/index'); ?>'">Annuler</button>
      </div>
	</form>

</div>
</div>
