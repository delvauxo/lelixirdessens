<?php $title_for_layout = 'Catalogues - VanAndVan' ?>

<div class="rounded-shadow" style="text-align: justify; padding: 20px; color:#808080; margin-bottom: 10px;">
	<div style="font-size: 18px; font-family: arial; padding-left: 15px; padding-top: 20px;">
		<b>Nos catalogues :</b>
		<br/>
		<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>" style="margin-left: -15px;" />
	</div>
	<div style="text-align: justify; padding: 15px; line-height: 130%; font-size: 15px;">
	Voici les diférents catalogues mis à votre disposition :<br/>
	Pour la moindre question n'hésitez pas à contacter notre service clientèle : +32 475 32 51 04<br/>
	</div>

	<div>
		<table class="bordered-table zebra-striped" style="margin-left: 15px; width: 97%;" >
			<thead>
				<tr>
					<th style="text-align: center;">Nom</th>
					<th style="text-align: center;">Fichier</th>
					<th style="text-align: center;">Usine</th>
					<th style="text-align: center;">Actions</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($catalogues as $k => $v): ?>
					<tr>
						<td><?php echo ucfirst($v->name); ?></td>
						<td><?php echo ucfirst(basename($v->file)); ?></td>
						<td style="text-align: center;"><?php echo ucfirst($v->catname); ?></td>
						<td style="text-align: center;">
							<?php echo "<a href='http://vanandvan.be/fr/webroot/pdf/telecharge.php?pdf=$v->file'>Télécharger</a><br/>"; ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>		
	</div>

	<div style="padding-left: 15px;">
	<a href="<?php echo Router::url('users/logout');?>">Se déconnecter</a>
	</div>

</div>