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
								<a href="<?php echo Router::url('admin/posts/menus'); ?>">Menus de groupe</a> / 
								<a href="#" class="currentLink">Prix</a>
							</h1>
							<!-- BOISSONS -->
							<table>

								<?php foreach ($prix as $k => $v): 
								// recuperation depuis la BdD
								$prix[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($prix[$k]->date));
								$mois = date('m',strtotime($prix[$k]->date));
								$jour = date('d',strtotime($prix[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($prix[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/prix/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/prix/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;Prix des Menus de groupe</span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/prix/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
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