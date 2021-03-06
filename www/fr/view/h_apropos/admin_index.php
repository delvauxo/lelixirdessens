<div id="wrapper">
    <div class="main">
<!--==============================content================================-->
        <div id="content">
        	<div class="padding-content">
                <div class="center">
					<div class="box">
					  <div class="box-text">
							<h1>
								<a href="<?php echo Router::url('admin/contenu/index'); ?>">Contenu</a> / 
								<a href="<?php echo Router::url('admin/posts/home'); ?>">Home</a> / 
								<a href="#" class="currentLink">A propos</a>
							</h1>
						  <table>
						  	<?php foreach ($h_apropos as $k => $v): 
								// recuperation depuis la BdD
								$h_apropos[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($h_apropos[$k]->date));
								$mois = date('m',strtotime($h_apropos[$k]->date));
								$jour = date('d',strtotime($h_apropos[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($h_apropos[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>

								<tr>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/h_apropos/index'); ?>'" class="iconrow">&#x6a;</td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/h_apropos/index'); ?>'" class="mainrow"><span>Texte</span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/h_apropos/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
								</tr>

							<?php endforeach ?>
						  </table>
					  </div>
					</div>
				</div>
            </div>
			<div class="clear"></div>
        </div>
<!--==============================End content============================-->
	</div>
</div>
