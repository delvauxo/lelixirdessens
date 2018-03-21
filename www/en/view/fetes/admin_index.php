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
								<a href="<?php echo Router::url('admin/posts/fetes'); ?>">Menu de fetes</a> / 
								<a href="#" class="currentLink">Menus (<?php echo $total; ?>)</a>
							</h1>
							<!-- BOISSONS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Boissons (<?php echo $totalBoisson; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($boisson as $k => $v): 
								// recuperation depuis la BdD
								$boisson[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($boisson[$k]->date));
								$mois = date('m',strtotime($boisson[$k]->date));
								$jour = date('d',strtotime($boisson[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($boisson[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- ENTREES -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Entrées (<?php echo $totalEntree; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($entree as $k => $v): 
								// recuperation depuis la BdD
								$entree[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($entree[$k]->date));
								$mois = date('m',strtotime($entree[$k]->date));
								$jour = date('d',strtotime($entree[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($entree[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- PLATS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Plats (<?php echo $totalPlat; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($plat as $k => $v): 
								// recuperation depuis la BdD
								$plat[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($plat[$k]->date));
								$mois = date('m',strtotime($plat[$k]->date));
								$jour = date('d',strtotime($plat[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($plat[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- DESSERTS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Desserts (<?php echo $totalDessert; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($dessert as $k => $v): 
								// recuperation depuis la BdD
								$dessert[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($dessert[$k]->date));
								$mois = date('m',strtotime($dessert[$k]->date));
								$jour = date('d',strtotime($dessert[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($dessert[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/fetes/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
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