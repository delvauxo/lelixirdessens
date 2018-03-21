<!--==============================content================================-->
        <div id="content">
        	<div class="padding-content">
                <div class="center">
					<div class="box" style="height: 156px;">
						<div class="box-text">
							<h1>Aide</h1>
							<span>
								Vous pouvez nous envoyer votre demande en remplissant le 
								formulaire ci-dessous. Nous vous répondrons dans les plus 
								brefs délais. Vous pouvez aussi nous appeler au 0486 35 26 99
							</span>
						</div>
					</div>                	
					<div class="box">
						<div class="box-text">						
							<div class="indent-1" style="width: 438px; margin: 0 auto 0 auto;">
								<form action="<?php echo Router::url('posts/mail2'); ?>" method="post" enctype="multipart/form-data">
									<!-- Champs caché pour indiquer que le formulaire à été soumis -->
									<input type='hidden' name='envoyer' value='1' />			
									<?php echo $this->FormBackAide->input('nom','Nom'); ?>
									<?php echo $this->FormBackAide->input('prenom','Pr&eacute;nom'); ?>
									<?php echo $this->FormBackAide->input('mobile','Téléphone'); ?>
									<?php echo $this->FormBackAide->input('email','Email'); ?>
									<?php echo $this->FormBackAide->input('client_id','ID Client'); ?>
									<?php echo $this->FormBackAide->input('message','Votre question',array('type'=>'textarea','class'=>'xxlarge wysiwyg','rows'=>5)); ?>
									<div class="actions">
									<div style="text-align: right; margin-top: 15px;">
										<button class="aidebutton" type="submit">Envoyer</button>
									</div>
									</div>
								</form>							
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
<!--==============================End content============================-->