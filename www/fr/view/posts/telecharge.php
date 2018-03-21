<?php 
 header("Content-type: application/pdf"); 
 header("Content-Disposition: attachment; filename=$_GET[pdf]"); 
 readfile($_GET['pdf']); 
 ?>

*/ 	Fichier à placer obligatoirement dans le dossier contenant les fichiers *.pdf
	Sinon cela ne marchera pas...
/*