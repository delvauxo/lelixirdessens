<div id="wrapper">
    <div class="main">
<!--==============================content================================-->
        <div id="content">
        	<div class="padding-content">
                <div class="center">
					<div class="box">
					  <div class="box-text">
							<h1>
								<a href="<?php echo Router::url('admin/posts/contenu'); ?>">Contenu</a> / 
								<a href="<?php echo Router::url('admin/posts/home'); ?>">Home</a> / 
								<a href="#" class="currentLink">Article de presse</a>
							</h1>
						  <table>
						  	<?php foreach ($citation as $k => $v): 
								// recuperation depuis la BdD
								$citation[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($citation[$k]->date));
								$mois = date('m',strtotime($citation[$k]->date));
								$jour = date('d',strtotime($citation[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($citation[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>		

								<tr>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/citation/index'); ?>'" class="iconrow">&#x6a;</td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/citation/index'); ?>'" class="mainrow"><span>Texte</span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/citation/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
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
