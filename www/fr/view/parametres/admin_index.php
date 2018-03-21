<!--==============================content================================-->

        <div id="content">

        	<div class="padding-content">

                <div class="center">

					<div class="box">

						<div class="box-text">

							<h1>Configuration </h1>

							<table>

								<tr>

									<td class="iconrow">&#xe023;</td>

									<td class="mainrow"><span>Client ID</span></td>

									<td class="mainrowcfg"><span>MW0001</span></td>

								</tr>

								<tr>

									<td class="iconrow">&#xe025;</td>	

									<td class="mainrow"><span>CMS Version</span></td>

									<td class="mainrowcfg"><span>V 1.0</span></td>

								</tr>

								<tr>

									<td class="iconrow">&#xe022;</td>

									<td class="mainrow"><span>Hébergement</span></td>

									<td class="mainrowcfg"><span>Pro - 100 Go</span></td>

								</tr>

								<tr>

									<td class="iconrow">&#x70;</td>

									<td class="mainrow"><span>URL (back-office)</span></td>

									<td class="mainrowcfg"><span><?= url_actuelle(); ?>/cockpit</span></td>

								</tr>

								<tr>

									<td class="iconrow">&#xe001;</td>

									<td class="mainrow"><span>Login</span></td>

									<td class="mainrowcfg"><span>admin</span></td>

								</tr>

								<tr>

									<td class="iconrow">&#x5c;</td>

									<td class="mainrow"><span>Password</span></td>

									<td class="mainrowcfg"><span class="text-btn-edit">admin</span></td>

								</tr>

							</table>

						</div>

					</div>                 	

					<div class="box">

						<div class="box-text">

								<h1>

									<a href="<?php echo Router::url('admin/parametres/index'); ?>">SEO</a> / 

									<a href="#" class="currentLink">Référencement Pages (<?php echo $total; ?>)</a>

								</h1>

								<table>

									<tr>

									<td>&nbsp;</td>

									<td>&nbsp;</td>

									<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/parametres/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>

									</tr>

								  	<?php foreach ($parametres as $k => $v): 

										// recuperation depuis la BdD

										$parametres[$k]->date; // de la forme AAAA-MM-JJ

										// annee, moi, jour

										$annee = date('Y',strtotime($parametres[$k]->date));

										$mois = date('m',strtotime($parametres[$k]->date));

										$jour = date('d',strtotime($parametres[$k]->date));

										// date en francais de la forme JJ/MM/AAAA

										$ladate_fr = date('d-m-Y',strtotime($parametres[$k]->date));

										// remplacement des "-" par des "/"

										$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								

										 ?>		



										<tr>

										<td onclick="JavaScript:document.location='<?php echo Router::url('admin/parametres/index'); ?>'" class="iconrow">&#x6a;</td>

										<td onclick="JavaScript:document.location='<?php echo Router::url('admin/parametres/index'); ?>'" class="mainrow"><span>Page <?php echo $k+1; ?>&nbsp;-&nbsp;<?php echo ucfirst($v->page); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>

										<td onclick="JavaScript:document.location='<?php echo Router::url('admin/parametres/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>

										<td onclick="JavaScript:document.location='<?php echo Router::url('admin/parametres/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>

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

        </div>

<!--==============================End content============================-->

