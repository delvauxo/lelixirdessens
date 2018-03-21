<div class="page-header">
	<h1><?php echo $total; ?> Catalogues</h1>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>En ligne</th>
			<th>Nom</th>
			<th>Usine</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($catalogues as $k => $v): ?>
			<tr>
				<td><?php echo $v->id; ?></td>
				<td style="text-align: left;"><span class="label label-<?php echo ($v->online==1)?'success':'error'; ?>"><?php echo ($v->online==1)?'En ligne':'Hors ligne'; ?></span></td>
				<td><?php echo $v->name; ?></td>
				<td><?php echo $v->catname; ?></td>
				<td>
					<a href="<?php echo Router::url('admin/catalogues/edit/'.$v->id); ?>">Editer</a>
					<span>&nbsp;ou&nbsp;</span>
					<a onclick="return confirm('Voulez vous vraiment supprimer ce contenu'); " href="<?php echo Router::url('admin/catalogues/delete/'.$v->id); ?>">Supprimer</a>
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

<a href="<?php echo Router::url('admin/catalogues/edit'); ?>" class="primary btn">Ajouter un catalogue</a>