<!--==============================content================================-->
        <div id="content">
        	<div class="padding-content">
                <div class="center">
					<div class="box">
					  	<div class="box-text">
							<h1>Statistiques </h1>
							<table>
								<tr>
									<td class="iconrow">&#xe001;</td>
									<td class="mainrow"><span>Nom d'utilisateur</span></td>
									<td class="secondrow"><span><?php echo $analytics[0]->login; ?></span></td>
								</tr>
								<tr>
									<td class="iconrow">&#x5c;</td>
									<td class="mainrow"><span>Mot de passe</span></td>
									<td class="secondrow"><span><?php echo $analytics[0]->password; ?></span></td>
								</tr>
								<tr>
									<td class="iconrow">&#x70;</td>
									<td class="mainrow"><span>Lien</span></td>
									<td class="secondrow"><a style="text-decoration: none;" href="<?php echo $analytics[0]->lien_fr; ?>" target="_blank"><span style="color: #3C5A99;">Google Analytics</span></a></td>
								</tr>
							</table>
					  	</div>
					</div>
				</div>
            </div>
        </div>
<!--==============================End content============================-->