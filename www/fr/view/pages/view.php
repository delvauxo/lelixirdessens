<?php $title_for_layout = $page->name; ?>

<div style="background-image: url('<?php echo Router::webroot('img/layout/box_top.png'); ?>'); width: 918px; height: 7px; "></div>
<div style="background-image: url('<?php echo Router::webroot('img/layout/box_sides.png'); ?>'); width: 918px;">
	<div style="font-size: 18px; font-family: arial; padding-left: 15px; padding-top: 20px;"><b>Notre entreprise</b></div>
	<div style="padding: 15px; text-align: justify; line-height: 130%; font-size: 15px;"><?php echo $page->content; ?></div>
</div>
<div style="background-image: url('<?php echo Router::webroot('img/layout/box_bottom.png'); ?>'); width: 918px; height: 6px;"></div>
