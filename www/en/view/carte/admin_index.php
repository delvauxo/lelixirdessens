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
								<a href="#" class="currentLink">Carte (<?php echo $total; ?>)</a>
							</h1>
							<!-- ENTREES -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Entrées froides et chaudes (<?php echo $totalEntree; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
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
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom_fr); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- PATES -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Pâtes fraîches (<?php echo $totalPates; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($pates as $k => $v): 
								// recuperation depuis la BdD
								$pates[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($pates[$k]->date));
								$mois = date('m',strtotime($pates[$k]->date));
								$jour = date('d',strtotime($pates[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($pates[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom_fr); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- POISSONS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Poissons (<?php echo $totalPoisson; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($poisson as $k => $v): 
								// recuperation depuis la BdD
								$poisson[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($poisson[$k]->date));
								$mois = date('m',strtotime($poisson[$k]->date));
								$jour = date('d',strtotime($poisson[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($poisson[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom_fr); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- VIANDES -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Viandes (<?php echo $totalViande; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($viande as $k => $v): 
								// recuperation depuis la BdD
								$viande[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($viande[$k]->date));
								$mois = date('m',strtotime($viande[$k]->date));
								$jour = date('d',strtotime($viande[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($viande[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom_fr); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- DESSERTS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Desserts (<?php echo $totalDessert; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
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
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom_fr); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/carte/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
					  </div>
		            <div class="pagination" style="margin: 10px 0 0 25px;">
					  <ul>
					  <?php for($i=1; $i <= $page; $i++): ?>
					    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					  <?php endfor; ?>
					  </ul>
					</div>					  
					</div>
										
				</div>
            </div>
			<div class="clear"></div>
        </div>
<!--==============================End content============================-->
	</div>
</div>