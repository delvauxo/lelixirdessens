<!-- Titre & Description du layout

================================================ -->

<?php $title_for_layout = $parametres[5]->title_for_layout_fr; ?>

<?php $description_for_layout = $parametres[5]->description_for_layout_fr; ?>



<!-- Start Contact -->

<section id="Contact" class="light-section"> 

	<div class="container inner">

    	<div class="row">

        	<div class="col-md-12">

                <div class="title-section text-center">

                    <h3>Réservation</h3>

                    <div class="line-break"></div>

                </div>

                <div class="description-section text-center">

                    <p>Vous souhaitez réserver une table dans notre établissement, veuillez prendre contact par téléphone, e-mail ou encore via notre formulaire de réservation. Nous vous confirmerons votre demande dans les plus brefs délais.</p>

                </div>

            </div>

        </div>

        <div class="divcod30"></div>

        <div class="row">

					<div class="col-md-8">

						<div class="Contact-Form">

							<form class="leave-comment contact-form" method="post" action="<?php echo Router::url('posts/mailReservation'); ?>" id="cform" autocomplete="on" enctype="multipart/form-data">

								<div class="Contact-us">



									<!-- Nom -->

									<?= $this->FormReservation->input('nom2', 'Nom de réservation'); ?>



		              <!-- Email -->

		              <?= $this->FormReservation->input('email', 'Email'); ?>



		              <!-- Phone -->

		              <?= $this->FormReservation->input('tel', 'Téléphone'); ?>



		              <!-- Nombre de couverts -->

		              <?= $this->FormReservation->input('nb_pers', 'Nombre de couverts', array('type'=>'number')); ?>



		              <!-- Date-->

									<?= $this->FormReservation->input('date3','Date de réservation',array('class'=>'datepicker')); ?>



		              <!-- Heure -->

									<?= $this->FormReservation->input('heure','Heure de réservation (Exemple : '.date("H.i").')'); ?>	



		              <!-- Service -->

									<?php  $chooseType = array(1 => 'Service du Midi', 2 => 'Service du Soir'); ?>

									<?= $this->FormReservation->input('service','Service',array('options' => $chooseType)); ?>



		              <!-- Message -->

									<?= $this->FormReservation->input('message2','Message',array('type'=>'textarea')); ?>



									<!-- Champs caché -->

									<input type='hidden' name='envoyer' value='1' />



									<div class="form-submit">

										<input type="submit" class="btn btn-large main-bg" value="Envoyer">

									</div>

								</div>

							</form>

						</div>

					</div>



					<div class="col-md-4">

						<div class="Contact-Info dark-section">

							<div class="Title-Contact">

								<h3>Addresse :</h3>

							</div>

							<div class="Block-Contact">

								<ul>

									<li>

										<i class="fa fa-map-marker" style="font-size: 20px;"></i>

		                <p>Avenue Albert 1er, 38<br />

		                1332 Genval<br />

										Belgique</p>

									</li>

									<li>

										<i class="fa fa-phone" style="font-size: 20px;"></i>

										<p>+32 2 652 57 06</p>

									</li>

									<li>
									<!--
										<i class="fa fa-envelope"></i>

										<p><a href="mailto:info@lelixirdessens.com">info@lelixirdessens.com</a></p>
									-->
									</li>

								</ul>	

							</div>					

						</div>

					</div>

        </div>

    </div>

</section>



