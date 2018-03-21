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
								<a href="#" class="currentLink">Vins (<?php echo $total; ?>)</a>
							</h1>
							<!-- SUGGESTIONS DU MOIS -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Suggestions du mois (<?php echo $totalSuggestion; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($suggestion as $k => $v): 
								// recuperation depuis la BdD
								$suggestion[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($suggestion[$k]->date));
								$mois = date('m',strtotime($suggestion[$k]->date));
								$jour = date('d',strtotime($suggestion[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($suggestion[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- VIN DU PATRON -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Vins du patron (<?php echo $totalPatron; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($patron as $k => $v): 
								// recuperation depuis la BdD
								$patron[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($patron[$k]->date));
								$mois = date('m',strtotime($patron[$k]->date));
								$jour = date('d',strtotime($patron[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($patron[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- VIN ROUGE -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Vin rouge (<?php echo $totalRouge; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($rouge as $k => $v): 
								// recuperation depuis la BdD
								$rouge[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($rouge[$k]->date));
								$mois = date('m',strtotime($rouge[$k]->date));
								$jour = date('d',strtotime($rouge[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($rouge[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- VIN BLANC -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Vin blanc (<?php echo $totalBlanc; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($blanc as $k => $v): 
								// recuperation depuis la BdD
								$blanc[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($blanc[$k]->date));
								$mois = date('m',strtotime($blanc[$k]->date));
								$jour = date('d',strtotime($blanc[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($blanc[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- VIN ROSE -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Vin rosé (<?php echo $totalRose; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($rose as $k => $v): 
								// recuperation depuis la BdD
								$rose[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($rose[$k]->date));
								$mois = date('m',strtotime($rose[$k]->date));
								$jour = date('d',strtotime($rose[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($rose[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	
								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

								<?php endforeach ?>
							</table>
							<!-- CHAMPAGNE & PROSECCO -->
							<table>
								<tr>
									<td style="width: 91px;">&nbsp;</td>
									<td class="titlerow">Champagne & Prosecco (<?php echo $totalChampagne; ?>)</td>
									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
								</tr>

								<?php foreach ($champagne as $k => $v): 
								// recuperation depuis la BdD
								$champagne[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($champagne[$k]->date));
								$mois = date('m',strtotime($champagne[$k]->date));
								$jour = date('d',strtotime($champagne[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($champagne[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	
								<tr>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="iconrow">&#x6a;</td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->nom); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
									<td onclick="JavaScript:document.location='<?php echo Router::url('admin/vins/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
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