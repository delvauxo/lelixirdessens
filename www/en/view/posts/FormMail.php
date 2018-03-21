<?php $title_for_layout_fr = 'Contact - VanAndVan' ?>

<div class="rounded-shadow" style="text-align: justify; padding: 20px; color:#808080; margin-bottom: 10px;">
	<div style="font-size: 18px; font-family: arial; padding-left: 15px; padding-top: 20px;">
		<b>Contact :</b>
		<br/>
		<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>" style="margin-left: -15px;" />
	</div>


	<div style="line-height: 130%;  text-align: left; padding-top: 15px; text-align: center;" >
	<b>Van & Van sprl </b>&nbsp;-&nbsp;
	<i>Av.Marengo 7 bte 11</i>&nbsp;-&nbsp;
	<i>B-1410 Waterloo</i>&nbsp;-&nbsp;
	<b>Tél/Fax</b> : +32 2 351 36 51&nbsp;-&nbsp;
	<b>GSM</b> : +32 475 32 51 04&nbsp;-&nbsp;
	<b>Mail</b> : info@vanandvan.be
	</div>

	<!-- LIGNE DE SEPARATION -->
	<img style="width: 920px; height: 1px; margin-bottom: 0px; margin-left: -10px; " src="<?php echo Router::webroot('img/layout/under_actu_2.png'); ?>">

	<div style="text-align: justify; padding: 15px; line-height: 130%; font-size: 14px;">
		<form action="mail" method="post" enctype="multipart/form-data">
			<!-- Champs caché pour indiquer que le formulaire à été soumis -->
			<input type='hidden' name='envoyer' value='1' />			
			<?php echo $this->Form->input('nom','Nom'); ?>
			<?php echo $this->Form->input('prenom','Pr&eacute;nom'); ?>
			<?php echo $this->Form->input('email','Adresse e-mail'); ?>
			<?php echo $this->Form->input('message','Message',array('type'=>'textarea','class'=>'xxlarge wysiwyg','rows'=>5)); ?>
			<div class="actions">
				<input type="submit" class="btn primary" value="Envoyer">
			</div>
		</form>
	</div>
</div>



