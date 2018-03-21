<?php require 'header.php'; ?>

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
                    <p>Vous souhaitez réserver une table dans notre établissement, veuillez prendre contact avec notre personnel par téléphone, e-mail ou encore via notre formulaire de réservation. Nous vous confirmerons votre demande dans les plus brefs délais.</p>
                </div>
            </div>
        </div>
        <div class="divcod30"></div>
        <div class="row">
			<div class="col-md-8">
				<div class="Contact-Form">
					<form class="leave-comment contact-form" method="post" action="#" id="cform" autocomplete="on">
						<div class="Contact-us">

              <div class="form-input">
              <!-- Nom -->
                <input type="text" name="name" placeholder="Votre Nom" required>
              </div>

              <div class="form-input">
              <!-- Email -->
                <input type="email" name="email" placeholder="Email" required>
              </div>

              <div class="form-input">
              <!-- Phone -->
                <input type="text" name="phone" placeholder="Téléphone" required>
              </div>

              <div class="form-input">
                <!-- Nombre de couverts -->
                <input type="number" name="number" id="number" placeholder="Nombre de couverts" max="100">
              </div>   

              <div class="form-input">
                <!-- Date-->
                <input type="date" name="date" id="date" placeholder="Date">
              </div>

              <div class="form-input">
              <!-- Heure -->
                <input type="time" value="08:30" />
              </div>

              <div style="width: 100%; display: inline-block; float: left; margin-bottom: 20px;">
              <!-- Service -->
                <select>
                  <option value="" disabled selected>Veuillez selectionner le service</option>
                  <option>Service du midi</option>
                  <option>Service du soir</option>
                </select>
              </div>

							<div class="form-textarea">
								<textarea class="txt-box textArea" name="message" cols="40" rows="7" id="messageTxt" placeholder="Message" spellcheck="true" required></textarea>
							</div>

							<div class="form-submit">
								<input type="submit" class="btn btn-large main-bg" value="Envoyer">
							</div>

						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4 dark-section" style="padding-top: 11px;">
				<div class="Contact-Info">
					<div class="Title-Contact">
						<h3>Addresse :</h3>
					</div>
					<div class="Block-Contact">
						<ul>
							<li>
								<i class="fa fa-map-marker"></i>
                <p>Avenue Albert 1er, 38<br />
                1332 Rixensart<br />
								Belgique</p>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<p>+32 2 652 57 06</p>
							</li>
							<li>
								<i class="fa fa-fax"></i>
								<p>+32 2 652 57 06</p>
							</li>
							<li>
								<i class="fa fa-envelope"></i>
								<p>contact@lelixirdessens.com</p>
							</li>
						</ul>	
					</div>					
				</div>
			</div>

        </div>
    </div>
</section>

<!-- End Contact -->

<?php require 'footer.php'; ?>
