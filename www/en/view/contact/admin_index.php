<div class="page-header">
	<h1><?php echo $total; ?> Contact</h1>
</div>

<table class="bordered-table zebra-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>En ligne</th>
			<th>File</th>
			<th>Link</th>
			<th>Texte</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $k => $v): ?>
			<tr>
				<td><?php echo $v->id; ?></td>
				<td style="text-align: left;"><span class="label <?php echo ($v->online==1)?'success':'error'; ?>"><?php echo ($v->online==1)?'En ligne':'Hors ligne'; ?></span></td>
				<td><?php echo $v->file; ?></td>
				<td><?php echo $v->linkedto; ?></td>
				<td><?php echo $v->caption; ?></td>
				<td>
					<a href="<?php echo Router::url('admin/slides/edit/'.$v->id); ?>">Editer</a>
					<span>&nbsp;ou&nbsp;</span>
					<a onclick="return confirm('Voulez vous vraiment supprimer ce contenu'); " href="<?php echo Router::url('admin/slides/delete/'.$v->id); ?>">Supprimer</a>
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

<a href="<?php echo Router::url('admin/slides/edit'); ?>" class="primary btn">Ajouter un slide</a>