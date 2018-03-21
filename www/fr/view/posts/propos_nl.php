<?php $title_for_layout = 'Over VanAndVan.be' ?>

<div class="rounded-shadow" style="text-align: justify; padding: 20px; color:#808080; margin-bottom: 10px;">
	<div style="font-size: 18px; font-family: arial; padding-left: 15px; padding-top: 20px;">
		<b>Over :</b>
		<br/>
		<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>" style="margin-left: -15px;" />
	</div>
	<div style="text-align: justify; padding: 15px; line-height: 130%; font-size: 14px;">
		<?php echo $about[0]->description_nl; ?>
	</div>
</div>