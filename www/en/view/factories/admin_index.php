<div class="page-header">
	<h1><?php echo $total; ?> Usines</h1>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>En ligne</th>
			<th>Nom</th>
			<th>Pays</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($factories as $k => $v): ?>
			<tr>
				<td><?php echo $v->id; ?></td>
				<td style="text-align: left;"><span class="label label-<?php echo ($v->online==1)?'success':'error'; ?>"><?php echo ($v->online==1)?'En ligne':'Hors ligne'; ?></span></td>
				<td><?php echo $v->name; ?></td>
				<td>
				<?php 
					// compte le nombre de caracteres présent dans le titre
					$chars = strlen($v->country);
				 ?>

				<?php 
					if($chars > 10)
						{echo ucfirst(substr($v->country, 0, 10)).'...<br />';}
					else
						{echo ucfirst($v->country).'<br />';} 
				?>
				</td>				
				<td>
					<a href="<?php echo Router::url('admin/factories/edit/'.$v->id); ?>">Editer</a>
					<span>&nbsp;ou&nbsp;</span>
					<a onclick="return confirm('Voulez vous vraiment supprimer ce contenu'); " href="<?php echo Router::url('admin/factories/delete/'.$v->id); ?>">Supprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>


<div class="pagination">
  <ul>
  <?php for($i=1; $i <= $page; $i++): ?>
    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
  </ul>
</div>

<a href="<?php echo Router::url('admin/factories/edit'); ?>" class="primary btn">Ajouter une usine</a>