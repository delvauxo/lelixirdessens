<?php
	// NORMALISATION.PHP
	// Application de la suppression des échappements, si nécessaire, 
	// dans tous les tableaux contenant des données HTTP

	// NORMALISATIONHTT.PHP

	// Cette fonction supprime tout échappement automatique
	// des données HTTP dans un tableau de dimension quelconque

	function NormalisationHTTP($tableau)
	{
		// Parcours du tableau
		foreach ($tableau as $cle => $valeur)
		{
			if (!is_array($valeur)) // c'est un élément: on agit
				$tableau[$cle] = stripSlashes($valeur);
			else // c'est un tableau : on appel récursivement
				$tableau[$cle] = NormalisationHTTP($valeur);
			}
			return $tableau;
	}	
	
	function Normalisation()
	{
		// Si l'on est en échappement automatique, on rectifie...
		if (get_magic_quotes_gpc()) {
			$_POST = NormalisationHTTP($_POST);
			$_GET = NormalisationHTTP($_GET);
			$_REQUEST = NormalisationHTTP($_REQUEST);
			$_COOKIE = NormalisationHTTP($_COOKIE);
		}
	}


	// CONTROLEMAIL.PHP

	// Fonction controlant l'entrée de l'application e-mail.

	function ControleMail(&$mail)
	{
		// Le tableau en paramètre doit contenir les entrées :
		// nom, sujet et message. Vérification.
		
$mail['nom'] = htmlSpecialChars($mail['nom']);
		
$mail['email'] = htmlSpecialChars($mail['email']);
		
$mail['tel'] = htmlSpecialChars($mail['tel']);
		
$mail['message3'] = htmlSpecialChars($mail['message3']);
		
// Maintenant on peut/doit également faire des controles
// sur des valeurs attendues: nom, sujet, message.
// Voir les exercices pour les suggestions.
		
return true;
	}


	// CONNECT.PHP

	// Fichier contenant les définitions de constantes
	// pour la connexion à MySQL

	define ('NOM', "lelixirdvlweb");
	define ('PASSE', "9sqmx7R6");
	define ('SERVEUR', "lelixirdvlweb.mysql.db");
	define ('BASE', "lelixirdvlweb");


	// CONNEXION.PHP

	// Fonction Connexion : connexion à MySQL

	function connexion ($pNom, $pMotPasse, $pBase, $pServeur) {
		
		// Connexion au serveur
		
		$connexion = mysql_pconnect ($pServeur, $pNom, $pMotPasse);
		
		if (!$connexion) {
			echo "Désolé, connexion au serveur $pServeur impossible\n";
			exit;
		}
		
		// Connexion à la base
		
		if (!mysql_select_db ($pBase, $connexion)) {
			echo "Désolé, accès à la base $pBase impossible\n";
			echo "<b>Message de MySQL :</b> " . mysql_error($connexion);
			exit;
		}

		// On renvoie la variable de connexion
		
		return $connexion;
		
	} // Fin de la fonction	


	// EXECREQUETE.PHP

	// Exécution d'une requête avec MySQL
	function ExecRequete ($requete, $connexion)
	{
		$resultat = mysql_query ($requete, $connexion);
		
		if($resultat)
			return $resultat;
		else {
			echo "<b>Erreur dans l'exécution de la requête '$requete'.</b><br/>";
			echo"<b>Message de MySQL :</b>" . mysql_error($connexion);
			exit;
		}
	} // Fin de la fonction ExecRequete

	
	// Recherche de l'objet suivant
	function ObjetSuivant ($resultat)
	{
		return mysql_fetch_object ($resultat);
	}

	
	// Recherche de la ligne suivante (retourne un tableau)
	function LigneSuivante ($resultat)
	{
		return mysql_fetch_assoc ($resultat);
	}	

	// UTILBD.PHP

	// Fonctions et déclarations pour l'accès à MySQL


	// STOCKEMAIL.PHP

	// Fonction stockant un e-mail dans la base le tableau en
	// paramètre doit contenir les entrées nom, sujet
	// et message. NB: il faudrait vérifier les valeurs...

	function StockeMail ($mail)
	{
		// Connexion au serveur
		$connexion = Connexion (NOM, PASSE, BASE, SERVEUR);
		
		// On échappe les caractères génants.
		$nom 		= mysql_real_escape_string($mail['nom']);
		$email 		= mysql_real_escape_string($mail['email']);
		$tel 		= mysql_real_escape_string($mail['tel']);
		$message 	= mysql_real_escape_string($mail['message3']);
		
		// Formatage de la date au format FR
		// ================================================
		// recuperation depuis la BdD
		$dateReserv; // de la forme AAAA-MM-JJ
		// annee, moi, jour
		$annee = date('Y',strtotime($dateReserv));
		$mois = date('m',strtotime($dateReserv));
		$jour = date('d',strtotime($dateReserv));
		// date en francais de la forme JJ/MM/AAAA
		$ladate_fr = date('Y-m-d',strtotime($dateReserv));

		// Création et exécution de la requête
		
		$requete = "INSERT INTO contacts(nom, email, tel, message3, date_envoi) "
			. "VALUES ('$nom', '$email', '$tel', '$message', NOW())";
			
			ExecRequete ($requete, $connexion);
	}


	// AFFICHEMAIL.PHP

	// AfficheMail à concevoir sois même...

	function AfficheMail ($mail)
	{
		
		// Extraction des paramètres
		$nom 			= $mail['nom'];
		$email 			= $mail['email'];
		$tel 			= $mail['tel'];
		$message 		= $mail['message3'];
		// On retire toutes les balises HTML du message
		$message = strip_tags($mail['message3']);

		// Formatage de la date au format FR
		// ================================================
		// recuperation depuis la BdD
		$dateReserv; // de la forme AAAA-MM-JJ
		// annee, moi, jour
		$annee = date('Y',strtotime($dateReserv));
		$mois = date('m',strtotime($dateReserv));
		$jour = date('d',strtotime($dateReserv));
		// date en francais de la forme JJ/MM/AAAA
		$ladate_fr = date('d-m-Y',strtotime($dateReserv));

		
		
		echo "<br/>Voici vos coordonnées :<br/><br/>
						Nom : <b>$nom</b><br/>
						E-mail : <b>$email</b><br/>
						Tél : <b>$tel</b><br/><br/>";

		echo "Votre Message :<br/>
					<b>$message</b><br/>
					a correctement été envoyé à l'adresse suivante :<br/>
					<b>info@lelixirdessens.com</b><br/><br/><br/>";



	}	


	// ENVOIMAIL.PHP

	// Fonction envoyant un e-mail. On suppose
	// que les controles ont été effectués avant l'appel à la 
	// fonction

	function EnvoiMail ($mail)
	{
		// Extraction des paramètres
		$destinataire 	= 'info@lelixirdessens.com';
		$nom 			= $mail['nom'];
		$email 			= $mail['email'];
		$tel 			= $mail['tel'];

		// Formatage de la date au format FR
		// ================================================
		// recuperation depuis la BdD
		$dateReserv; // de la forme AAAA-MM-JJ
		// annee, moi, jour
		$annee = date('Y',strtotime($dateReserv));
		$mois = date('m',strtotime($dateReserv));
		$jour = date('d',strtotime($dateReserv));
		// date en francais de la forme JJ/MM/AAAA
		$ladate_fr = date('d-m-Y',strtotime($dateReserv));

		$sujet 			= 'Nouvelle demande de contact';
		$imessage 		= strip_tags($mail['message3']);
		
		// On retire toutes les balises HTML du message
		$message = "<br/>Voici les informations relatives à la demande de contact :<br/><br/>
		<b>Nom</b> : ".$nom."<br/>
		<b>E-mail</b> : ".$email."<br/>
		<b>Tél</b> : ".$tel."<br/><br/>
		<b>Message</b> : ".$imessage.".";
		
		// On va indiquer l'expéditeur, et placer delvauxo@skynet.be en
		// copie
		$entete = "From: ".$email."\r\n";
		$entete .= "Bcc: delvauxo@skynet.be\r\n";
		$entete .= "Content-Type: text/html; charset=UTF-8; format=flowed\r\n";
		$entete .= "Content-Transfer-Encoding: 8bit\r\n";		
		
		// Appel à la fonction PHP standard
		mail ($destinataire, $sujet, $message, $entete);
	}
?>


<!-- Titre & Description du layout
================================================ -->
<?php $title_for_layout = $parametres[6]->title_for_layout_fr; ?>
<?php $description_for_layout = $parametres[6]->description_for_layout_fr; ?>

<!-- Start Contact -->
<section id="Contact" class="light-section"> 
	<div class="container inner">
    	<div class="row">
        	<div class="col-md-12">
                <div class="title-section text-center">
                    <h3>Contact</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Merci, nous avons pris bonne réception de votre demande de contact. Le restaurant vous répondra dans les plus brefs délais. Veuillez vérifier ci-dessous vos informations de contact que vous nous avez transmis afin d'être en mesure de pouvoir vous recontacter.</p>
                </div>
            </div>
        </div>
        <div class="divcod30"></div>
        <div class="row">
					<div class="col-md-8" style="font-family: 'Open Sans', sans-serif; font-size: 13px;">
						<div class="Contact-Info dark-section">
			<?php
			
			// Ajout au fichier cfg l'adresse SMPT de SKYNET qui permet d'envoyer outre LOCALHOST
			ini_set('SMTP','ns0.ovh.net');	
			
			// Inclusion des fichiers contenant les déclarations de fonctions 
			
			
			// Normalisation des entrées HTTP
			Normalisation();
			
			// Si la variable $envoyer existe, des données ont été saisies dans le formulaire
			
			if (isSet($_POST['envoyer'])) {
				// Contrôle des données en entrée
				if (!ControleMail($_POST)) {
					// un problème quelque part ? Il faut réagir
					echo "<p>Quelque chose ne va pas...</p>";
					exit;
				}
				
				// On a passé le test, maintenant stockage dans la base
				StockeMail($_POST);
				
				// On affiche le text de l'e-mail
				AfficheMail($_POST);
				
				// Envoi de l'e-mail
				EnvoiMail($_POST);
				
			}
			else {
				// On affiche simplement le formulaire
				require ("contact.php");
			}
			?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="Contact-Info dark-section">
							<div class="Title-Contact">
								<h3>Addresse :</h3>
							</div>
							<div class="Block-Contact">
								<ul>
									<li>
										<i class="fa fa-map-marker" style="font-size: 20px;"></i>
		                <p>Avenue Albert 1er, 38<br />
		                1332 Rixensart<br />
										Belgique</p>
									</li>
									<li>
										<i class="fa fa-phone" style="font-size: 20px;"></i>
										<p>+32 2 652 57 06</p>
									</li>
									<li>
										<i class="fa fa-mobile-phone" style="font-size: 25px;"></i>
										<p>+32 2 652 57 06</p>
									</li>
									<li>
										<i class="fa fa-envelope"></i>
										<p><a href="mailto:info@lelixirdessens.com">info@lelixirdessens.com</a></p>
									</li>
								</ul>	
							</div>					
						</div>
					</div>

        </div>
    </div>
</section>
		