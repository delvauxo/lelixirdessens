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
								<a href="#" class="currentLink">Services (<?php echo $total; ?>)</a>
							</h1>
						  <table>

							<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td colspan="2"onclick="JavaScript:document.location='<?php echo Router::url('admin/services/edit'); ?>'" class="addrow"><div class="fs1" aria-hidden="true" data-icon="&#x38;"></div></td>
							</tr>

						  	<?php foreach ($services as $k => $v): 
								// recuperation depuis la BdD
								$services[$k]->date; // de la forme AAAA-MM-JJ
								// annee, moi, jour
								$annee = date('Y',strtotime($services[$k]->date));
								$mois = date('m',strtotime($services[$k]->date));
								$jour = date('d',strtotime($services[$k]->date));
								// date en francais de la forme JJ/MM/AAAA
								$ladate_fr = date('d-m-Y',strtotime($services[$k]->date));
								// remplacement des "-" par des "/"
								$ladate_fr_antislash = str_replace("-", "/", $ladate_fr);								
								 ?>	

								<tr>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/services/index'); ?>'" class="iconrow">&#x6a;</td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/services/index'); ?>'" class="mainrow"><span><?php echo $k+1; ?>&nbsp;|&nbsp;<?php echo ucfirst($v->titre_fr); ?></span><br /><span class="date">Date de dernière modification : <?php echo $ladate_fr_antislash; ?></span></td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/services/edit/'.$v->id); ?>'" class="editrow"><div class="fs1" aria-hidden="true" data-icon="&#x41;"></div></td>
								<td onclick="JavaScript:document.location='<?php echo Router::url('admin/services/delete/'.$v->id); ?>'" class="deleterow"><div class="fs1" aria-hidden="true" data-icon="&#x35;"></div></td>
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