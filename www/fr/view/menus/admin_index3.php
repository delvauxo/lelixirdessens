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
								<a href="<?php echo Router::url('admin/menus/menus'); ?>">Menus</a> / 
								<a href="#" class="currentLink">Menu 3 (<?php echo $total; ?>)</a>
							</h1>
							<!-- ENTREES UN -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Entrées 1 (<?php echo $totalEntreeUn; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($entreeun as $k => $v): 
								// recuperation depuis la BdD
								$entreeun[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($entreeun[$k]->date));
								$mois = date('m',strtotime($entreeun[$k]->date));
								$jour = date('d',strtotime($entreeun[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($entreeun[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/delete3/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- ENTREES DOS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Entrées 2 (<?php echo $totalEntreeDos; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($entreedos as $k => $v): 
								// recuperation depuis la BdD
								$entreedos[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($entreedos[$k]->date));
								$mois = date('m',strtotime($entreedos[$k]->date));
								$jour = date('d',strtotime($entreedos[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($entreedos[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/delete3/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- ENTREES TRES -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Entrées 3 (<?php echo $totalEntreeTres; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($entreetres as $k => $v): 
								// recuperation depuis la BdD
								$entreetres[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($entreetres[$k]->date));
								$mois = date('m',strtotime($entreetres[$k]->date));
								$jour = date('d',strtotime($entreetres[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($entreetres[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/delete3/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- PLATS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Plats (<?php echo $totalPlat; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
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
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/delete3/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- DESSERTS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Desserts (<?php echo $totalDessert; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
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
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/index3'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/edit3/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/menus/delete3/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
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