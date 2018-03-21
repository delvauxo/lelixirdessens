<!--==============================content================================-->
        <div id="content">
        	<div class="padding-content">
                <div class="center">
					<div class="box">
					  	<div class="box-text">
							<h1>Customers (<?php echo $total; ?>) </h1>
						  <table>
							
							<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/customers/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
							</tr>

						  	<?php foreach ($posts as $k => $v): 
								// recuperation depuis la BdD
								$posts[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($posts[$k]->date));
								$mois = date('m',strtotime($posts[$k]->date));
								$jour = date('d',strtotime($posts[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($posts[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>						  	

								<tr>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/customers/index'); ?>'" class="iconrow">&#x6a;</td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/customers/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?> | <?php echo ucfirst($v->societe); ?>&nbsp;-&nbsp;<?php echo ucfirst($v->nom).'&nbsp;'.ucfirst($v->prenom); ?></span><br /><span class="date"><?php echo ucfirst($v->tracking); ?></span></td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/customers/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/customers/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
								</tr>

							<?php endforeach ?>
						  </table>
					  </div>
				<div>
		            <div class="pagination">
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
        </div>
<!--==============================End content============================-->
