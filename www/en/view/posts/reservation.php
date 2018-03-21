<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[5]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[5]->description_for_layout_fr; ?>

<!-- Style citation box
================================================ -->
<div class="grid_12">

<!-- Content Page - Contact Form...
================================================ -->
<div>
	<div class="grid_12" id="contacttitle">
		<span>Réservation</span>
		<div>&nbsp;</div>
	</div>

	<div class="grid_8 contact_main_content">

		<?php // echo $contact_intro[0]->texte_fr; ?>

		<div class="mw">
			<h2>Adresse</h2>
			<div><b>Poivre & Sel</b></div>
			<div>Rue du Parnasse, 2</div>
			<div>1050 Ixelles</div>
			<div>Belgique</div>
			<div>&nbsp;</div>
		</div>
		<div class="infosoc">
			<h2>Nous contacter</h2>
			<div>Téléphone : +(32) 2 503.46.93</div>
			<div>Fax : +(32) 2 503.36.53</div>
			<div>Email : <a href="mailto:info@poivre-et-sel.be">info@poivre-et-sel.be</a></div>
		</div>
		<div class="reservationForm">
			<h2>Réserver une table</h2>
			<form action="<?php echo Router::url('posts/mailReservation'); ?>" method="post" enctype="multipart/form-data">
				<fieldset>
				<!-- Champs caché pour indiquer que le formulaire à été soumis -->
				<input type='hidden' name='envoyer' value='1' />		
				<?php echo $this->FormReservation->input('nom2','Nom de réservation'); ?>
				<?php echo $this->FormReservation->input('email','E-mail de contact'); ?>
				<?php echo $this->FormReservation->input('tel','Numéro de téléphone'); ?>
		        <?php  $chooseType = array(0 => 'Choisissez un Service',1 => 'Service du Midi', 2 => 'Service du Soir'); ?>
		        <?php echo $this->FormReservation->input('service','Service',array('options' => $chooseType)); ?>
				<?php echo $this->FormReservation->input('nb_pers','Nombre de personnes'); ?>
				<?php echo $this->FormReservation->input('date3','Date de réservation',array('class'=>'datepicker')); ?>
				<?php echo $this->FormReservation->input('heure','Heure de réservation (Exemple : '.date("H.i").')'); ?>
				<?php echo $this->FormReservation->input('message2','Message',array('type'=>'textarea')); ?>
				</fieldset>
				<div class="actions">
					<input type="submit" class="btn_reserv" value="Envoyer">
				</div>
			</form>	
		</div>
	</div>

	<div class="grid_4" id="contact_side_content_2">
		<div class="phone">
			<i class="flaticon-chef10"></i>
		</div>
		<div class="phone_text">
			<h2>La cuisine est ouverte</h2>
			<span>Du lundi au vendredi</span><br/><br/>
			<span>de 12h00 à 14h30</span><br/>
			<span>de 18h00 à 22h30</span>
		</div>
	</div>

	<div class="grid_4" id="contact_side_content">
		<h2>Nous rejoindre</h2>
		<iframe class="reservation_map" width="100%" height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.be/maps?q=Rue+du+Parnasse,+Ixelles+2&amp;sll=50.838891,4.370909&amp;hl=fr&amp;ie=UTF8&amp;hq=&amp;hnear=Rue+du+Parnasse+2,+1050+Ixelles,+Bruxelles&amp;ll=50.838891,4.370909&amp;spn=0.011111,0.01929&amp;t=m&amp;z=14&amp;output=embed&iwloc=near"></iframe><br /><small><a href="https://maps.google.be/maps?q=Rue+du+Parnasse,+Ixelles+2&amp;sll=50.838891,4.370909&amp;hl=fr&amp;ie=UTF8&amp;hq=&amp;hnear=Rue+du+Parnasse+2,+1050+Ixelles,+Bruxelles&amp;ll=50.838891,4.370909&amp;spn=0.011111,0.01929&amp;t=m&amp;z=14&amp;source=embed" style="color:#0000FF;text-align:left" target="_blank">Agrandir le plan</a></small>&nbsp;/&nbsp;<small><a href="https://www.google.be/maps/preview/dir//Rue+du+Parnasse+2,+1050+Ixelles/@50.84844,4.375563,14z/data=!4m8!4m7!1m0!1m5!1m1!1s0x47c3c49adc9b4943:0x5b0a4dfaaf922ff9!2m2!1d4.3709087!2d50.8388906?hl=fr" style="color:#0000FF;text-align:left" target="_blank">Comment nous rejoindre ?</a></small>
	</div>

</div>

</div><!-- FIN -->

