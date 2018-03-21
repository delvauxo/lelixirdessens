<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[4]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[4]->description_for_layout_fr; ?>


<!-- Content Page - Portfolio...
================================================ -->
<div>
<!-- Récemment (Dernier projet)
================================================ -->
<div class="grid_12" id="lastprojecttitle">
	<span>Galerie photos</span>
	<div>&nbsp;</div>
</div>


	<!-- block 3 colonnes -->
	<?php
	foreach($portfolio as $cle=>$valeur) 
	{
				$idPost 		   	= 	$portfolio[$cle]->id;		// Pour le link Lire la suite
				$slugPost 		 	= 	$portfolio[$cle]->slug;		// Pour le link Lire la suite

	// Formatage de la date au format FR
	// ===================================================================== -->
				// recuperation depuis la BdD
				$portfolio[$cle]->created; // de la forme AAAA-MM-JJ
				// annee, moi, jour
				$annee = date('Y',strtotime($portfolio[$cle]->created));
				$mois = date('m',strtotime($portfolio[$cle]->created));
				$jour = date('d',strtotime($portfolio[$cle]->created));
				// date en francais de la forme JJ/MM/AAAA
				$ladate_fr = date('d-m-Y',strtotime($portfolio[$cle]->created));


	// Permet la conversion de photo couleurs vers noir & blanc
	// ===================================================================== -->

			$file_brut 			= $portfolio[$cle]->file;	
			$file_in			= Router::webroot('img/portfolio/'.$portfolio[$cle]->file);
			$file				= 'http://www.poivre-et-sel.be'.$file_in;

			$file_before_out 	= "out_".$portfolio[$cle]->file;
			$file_out 			= $file_before_out;


			// Je vérifie l'extension présumée du fichier : -> Permet l'upload de tout type de fichiers image
			$ExtensionPresumee	= explode('.', $file_brut);
			$ExtensionPresumee	= strtolower($ExtensionPresumee[count($ExtensionPresumee)-1]);
			if ($ExtensionPresumee == 'jpg' || $ExtensionPresumee == 'JPG' || $ExtensionPresumee == 'JPEG' || $ExtensionPresumee == 'jpeg' || $ExtensionPresumee == 'pjpg' || $ExtensionPresumee == 'pjpeg' || $ExtensionPresumee == 'gif' || $ExtensionPresumee == 'png')
			{
				// ImageCreateFrom... select
				switch ( $ExtensionPresumee ) {
					//pour le cas où l'extension est "jpeg"
					case "jpg":
					case "JPG":
					case "jpeg":
					case "JPEG": 
					case "pjpg": // IE
					case "pjpeg": // IE
					$im = imagecreatefromjpeg($file);
					if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
					{
					    // echo 'Image converted to grayscale.';
					    imagejpeg($im, 'img/portfolio/bw_'.$portfolio[$cle]->file);
					}
					else
					{
					    // echo 'Conversion to grayscale failed.';
					}
					imagedestroy($im);
					break;

					// Fichiers GIF
					case "gif":
					$im = imagecreatefromgif($file);
					if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
					{
					    // echo 'Image converted to grayscale.';
					    imagegif($im, 'img/portfolio/bw_'.$portfolio[$cle]->file);
					}
					else
					{
					    // echo 'Conversion to grayscale failed.';
					}
					imagedestroy($im);
					break;

					// Fichiers PNG
					case "png":
					$im = imagecreatefrompng($file);
					if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
					{
					    // echo 'Image converted to grayscale.';
					    imagepng($im, 'img/portfolio/bw_'.$portfolio[$cle]->file);
					}
					else
					{
					    // echo 'Conversion to grayscale failed.';
					}
					imagedestroy($im);
					break;

					// On peut également ouvrir les formats wbmp, xbm et xpm (vérifier la configuration du serveur)

					default:
					echo "L'image n'est pas dans un format reconnu. Extensions autorisées : jpg/jpeg, gif, png";
					break;
				}
			}


	?>
	<!-- Image - AFFICHAGE
	================================================ -->	
	<div class="thumb">
	<img width="298px" height="230px" src="<?php echo Router::webroot('img/portfolio/bw_'.$portfolio[$cle]->file); ?>">
	<!-- Légende
	================================================ -->	
	<div class="alt"><img width="298px" height="230px" src="<?php echo Router::webroot('img/portfolio/'.$portfolio[$cle]->file); ?>"></div> 
	</div>
		

	<?php												
	} 		// FIN CONTENU HOME PAGE (INFOS FORMULAIRE) --> ENDFOREACH
	?>



<!-- Pagination
================================================ -->
<div class="pagination" style="display: block; width: 30px; height: 30px; margin-left: 45px;">
  <ul>
  <?php for($i=1; $i <= $page; $i++): ?>
    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
  </ul>
</div> <!-- FIN PAGINATION -->


</div>
