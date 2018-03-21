<!-- Titre & Description du layout

================================================ -->

<?php $title_for_layout = $parametres[6]->title_for_layout_en; ?>

<?php $description_for_layout = $parametres[6]->description_for_layout_en; ?>



<!-- Start Contact -->

<section id="Contact" class="light-section"> 

	<div class="container inner">

    	<div class="row">

        	<div class="col-md-12">

                <div class="title-section text-center">

                    <h3>Contact</h3>

                    <div class="line-break"></div>

                </div>

                <div class="description-section text-center">

                    <p>For more information concerning reservations or anything else, please contact us by telephone, e-mail or fill in the form.</p>

                </div>

            </div>

        </div>

        <div class="divcod30"></div>

        <div class="row">

					<div class="col-md-8">

						<div class="Contact-Form">

							<form class="leave-comment contact-form" method="post" action="<?php echo Router::url('posts/mail2'); ?>" id="cform" autocomplete="on" enctype="multipart/form-data">

								<div class="Contact-us">



									<!-- Nom -->

									<?= $this->FormReservation->input('nom', 'Name'); ?>



		              <!-- Email -->

		              <?= $this->FormReservation->input('email', 'E-mail'); ?>



		              <!-- Phone -->

		              <?= $this->FormReservation->input('tel', 'Phone'); ?>



		              <!-- Message -->

									<?= $this->FormReservation->input('message3','Message',array('type'=>'textarea')); ?>



									<!-- Champs caché -->

									<input type='hidden' name='envoyer' value='1' />



									<div class="form-submit">

										<input type="submit" class="btn btn-large main-bg" value="Send">

									</div>

								</div>

							</form>

						</div>

					</div>



					<div class="col-md-4">

						<div class="Contact-Info dark-section">

							<div class="Title-Contact">

								<h3>Address :</h3>

							</div>

							<div class="Block-Contact">

								<ul>

									<li>

										<i class="fa fa-map-marker" style="font-size: 20px;"></i>

		                <p>Avenue Albert 1er, 38<br />

		                1332 Genval<br />

										Belgium</p>

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



<!-- Start Map Style1 -->

<section id="Contact" class="dark-section"> 

  <div class="container inner">

    <div class="row">

      <div class="col-md-12">

        <div onClick="style.pointerEvents='none'"></div>

          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5051.1128024719665!2d4.4898665!3d50.7281684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xeb713342ffdaf67c!2sL&#39;%C3%A9lixir+des+sens!5e0!3m2!1sen!2sus!4v1473935636209" width="1140" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

      </div>

    </div>

  </div>

</section>

<!-- End Map Style1 -->