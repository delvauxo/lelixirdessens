 <div style="padding: 25px 0 25px 0; width: 500px; margin: 0 auto 0 auto;">			


<div class="page-header">
	<h1>Les photos :</h1>
</div>

			<table class="table table-bordered" style="width: 500px; margin: 0 auto 0 auto;">
				<thead>
					<tr>
						<th style="text-align: center;">Image</th>
						<th style="text-align: center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($images as $k => $v): ?>
						<tr>
							<td style="text-align: center;">
								<a href="#" onclick="FileBrowserDialogue.sendURL('<?php echo Router::webroot('img/'.$v->file); ?>')">
									<img src="<?php echo Router::webroot('img/'.$v->file); ?>" height="50">
								</a>
							</td>
							<td style="text-align: center; vertical-align: middle;">
								<a onclick="return confirm('Voulez vous vraiment supprimer cette image'); " href="<?php echo Router::url('admin/medias/delete/'.$v->id); ?>">Supprimer</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>

<div class="page-header" style="margin-top: 25px;">
	<h1>Ajouter une photo</h1>
</div>



  <div style="border: 0px solid red;">
    <form action="<?php echo Router::url('admin/medias/index/'.$post_id); ?>" method="post" enctype="multipart/form-data">

        <!-- Collapse FORM
        ================================================== -->

	<div class="input">
		<span>Titre</span>
		<input type="text" id="inputname" name="name" value=""/>
	</div>

	<div class="input" style="margin-top: 15px;">
		<span>Image</span>
		<input type="file" class="input-file" id="inputfile" name="file"/>
	</div>

      	<?php echo $this->Form->input('id','hidden'); ?>

	<div class="actions">
		<input type="submit" value="Envoyer" class="btn primary">
		<a href="<?php echo Router::url('admin/posts/edit/'.$post_id); ?>" class="btn" target="_parent">Fermer</a>
	</div>
    </form>
    </div>
</div>
