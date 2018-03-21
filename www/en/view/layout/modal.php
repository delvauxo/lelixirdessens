<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo isset($title_for_layout)?$title_for_layout:'Administration'; ?></title> 
    <link rel="stylesheet" href="<?php echo Router::webroot('css/bootstrap-1.4.0.min.css'); ?>">
    </head> 
    <body>       
      
            <?php echo $this->Session->flash(); ?>
        	<?php echo stripslashes($content_for_layout); ?>
         
    </body> 
</html>