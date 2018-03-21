<?php $title_for_layout = 'Nos usines - VanAndVan' ?>

<div class="rounded-shadow" style="text-align: justify; padding: 20px; color:#808080; margin-bottom: 10px;">
	<div style="border: 0px dotted yellow; font-size: 18px; font-family: arial; padding-left: 15px; padding-top: 20px;">
		<b>Nos usines :</b>
		<br/>
		<img src="<?php echo Router::webroot('img/layout/post_underline.png'); ?>" style="margin-left: -15px;" />
	</div>
	<div style="border: 0px dotted green; text-align: justify; padding: 15px; line-height: 130%; font-size: 15px;">Toutes les usines sont choisies pour la qualité de leurs équipements industriel, le sérieux de leurs services.
	La plupart  de ces entreprises sont familiales avec encore plusieurs générations au travail avec un savoir faire et une bonne assise financière pour assurer une collaboration à long terme. 
	Nous sommes à votre disposition pour vous faire découvrir ces collections.
	</div>
</div>

<?php foreach ($factories as $key => $value) {
    if ($key % 2 != 0){ // Si l'indice du tableau est impair alors on rajoute : margin-right: 10px 

				
				echo  "<div class='rounded-shadow' style='text-align: center; padding: 20px; color:#808080; margin-bottom: 10px; width: 433px; float: left;'>
						<div style='font-size: 18px; font-family: arial; padding-top: 20px; text-align: center;'>
							<b>".$value->name."</b>
						</div>
						<div style='text-align: center;'>";
				if (!empty($value->website)) { echo "<a href='http://$value->website' target='_blank'>"; }
				echo 		"<img class='rounded-shadow' style='padding: 1px; width: 250px; height: 130px; margin-top: 20px;' src='".Router::webroot('logofacto/'.$value->file)."' />";
				if (!empty($value->website)) { echo "</a>"; }
				echo 		"</div>
						<div style='text-align: center; padding: 15px; line-height: 130%; font-size: 15px;'>"
							.$value->street."<br/>"
							.$value->city."<br/>"
							."<br/>"
							."<b>Tel : </b>".$value->phone."<br/>"
							."<b>Fax : </b>".$value->fax."<br/>"
							."<b>E-mail : </b>".$value->email."<br/>
						</div>
					  </div>";


			// ODD




	}else{ // SINON pas...


				echo "<div class='rounded-shadow' style='text-align: center; padding: 20px; color:#808080; margin-bottom: 10px; width: 433px; float: left; margin-right: 10px;'>
						<div style='font-size: 18px; font-family: arial; padding-top: 20px; text-align: center;'>
							<b>".$value->name."</b>
						</div>
						<div style='text-align: center;'>";
				if (!empty($value->website)) { echo "<a href='http://$value->website' target='_blank'>"; }
				echo 		"<img class='rounded-shadow' style='padding: 1px; width: 250px; height: 130px; margin-top: 20px;' src='".Router::webroot('logofacto/'.$value->file)."' />";
				if (!empty($value->website)) { echo "</a>"; }
				echo 		"</div>
						<div style='text-align: center; padding: 15px; line-height: 130%; font-size: 15px;'>"
							.$value->street."<br/>"
							.$value->city."<br/>"
							."<br/>"
							."<b>Tel : </b>".$value->phone."<br/>"
							."<b>Fax : </b>".$value->fax."<br/>"
							."<b>E-mail : </b>".$value->email."<br/>
						</div>
				  	</div>";

			if (!empty($value->website)) {
			    echo "</a>";
			}
	} // ODD
} ?>