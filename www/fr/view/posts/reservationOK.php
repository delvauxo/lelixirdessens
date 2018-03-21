<?php
	// NORMALISATION.PHP
debug($_POST);
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
		
		if (!isSet($mail['nom2']))
		{echo "Pas de nom !"; return false;}
		else $mail['nom2'] = htmlSpecialChars($mail['nom2']);
		
		if (!isSet($mail['email']))
		{echo "Pas de email !"; return false;}
		else $mail['email'] = htmlSpecialChars($mail['email']);
		
		if (!isSet($mail['tel']))
		{echo "Pas de tel !"; return false;}
		else $mail['tel'] = htmlSpecialChars($mail['tel']);
		
		if (!isSet($mail['service']))
		{echo "Pas de service !"; return false;}
		else $mail['service'] = htmlSpecialChars($mail['service']);
		
		if (!isSet($mail['nb_pers']))
		{echo "Veuillez indiquer le nombre de personne(s) !"; return false;}
		else $mail['nb_pers'] = htmlSpecialChars($mail['nb_pers']);
		
		if (!isSet($mail['date3']))
		{echo "Pas de date !"; return false;}
		else $mail['date3'] = htmlSpecialChars($mail['date3']);
		
		if (!isSet($mail['heure']))
		{echo "Pas d'heure !"; return false;}
		else $mail['heure'] = htmlSpecialChars($mail['heure']);
		
		if (!isSet($mail['message2']))
		{echo "Pas de message !"; return false;}
		else $mail['message2'] = htmlSpecialChars($mail['message2']);
		
		// On vérifie que les données sont pas vides
		if (empty($mail['nom2']))
		{echo "Nom vide !"; return false;}
		if (empty($mail['email']))
		{echo "Email vide !"; return false;}
		if (empty($mail['tel']))
		{echo "Tel vide !"; return false;}
		if (empty($mail['service']))
		{echo "Service vide !"; return false;}
		if (empty($mail['nb_pers']))
		{echo "nombre de personne(s) vide !"; return false;}
		if (empty($mail['date3']))
		{echo "Date vide !"; return false;}
		if (empty($mail['heure']))
		{echo "heure vide !"; return false;}
		if (empty($mail['message2']))
		{echo "Message vide !"; return false;}	
		
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
		$nom 		= mysql_real_escape_string($mail['nom2']);
		$email 		= mysql_real_escape_string($mail['email']);
		$tel 		= mysql_real_escape_string($mail['tel']);
		$service	= mysql_real_escape_string($mail['service']);
		$nb_pers	= mysql_real_escape_string($mail['nb_pers']);
		$dateReserv = mysql_real_escape_string($mail['date3']);
		$heure 		= mysql_real_escape_string($mail['heure']);
		$message 	= mysql_real_escape_string($mail['message2']);
		
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
		
		$requete = "INSERT INTO reservations(nom2, email, tel, service, nb_pers, date3, heure, message2, date_envoi) "
			. "VALUES ('$nom', '$email', '$tel', '$service', '$nb_pers', '$ladate_fr', '$heure', '$message', NOW())";
			
			ExecRequete ($requete, $connexion);
	}


	// AFFICHEMAIL.PHP

	// AfficheMail à concevoir sois même...

	function AfficheMail ($mail)
	{
		
		// Extraction des paramètres
		$nom 			= $mail['nom2'];
		$email 			= $mail['email'];
		$tel 			= $mail['tel'];
		$service 		= $mail['service'];
		$nb_pers 		= $mail['nb_pers'];
		$dateReserv 	= $mail['date3'];

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

		$heure 			= $mail['heure'];
		$message 		= $mail['message2'];
		
		// On retire toutes les balises HTML du message
		$message = strip_tags($mail['message2']);
		
		echo "<br/>Voici vos coordonnées :<br/><br/>
						Nom : <b>$nom</b><br/>
						E-mail : <b>$email</b><br/>
						Tél : <b>$tel</b><br/>";

		echo "<br/>	Service : <b>$service</b><br/>
					Nombre de personnes : <b>$nb_pers</b><br/>
					Date de réservation : <b>$ladate_fr</b><br/>
					Heure de réservation : <b>$heure</b><br/><br/>";

		echo "Votre Message :<br/>
					<b>$message</b><br/>
					a correctement été envoyé à l'adresse suivante :<br/>
					<b>delvauxo@outlook.com</b><br/><br/><br/>";
	}	


	// ENVOIMAIL.PHP

	// Fonction envoyant un e-mail. On suppose
	// que les controles ont été effectués avant l'appel à la 
	// fonction

	function EnvoiMail ($mail)
	{
		// Extraction des paramètres
		$destinataire 	= 'delvauxo@outlook.com';
		$nom 			= $mail['nom2'];
		$email 			= $mail['email'];
		$tel 			= $mail['tel'];
		$service 		= $mail['service'];
		$nb_pers 		= $mail['nb_pers'];
		$dateReserv 	= $mail['date3'];

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

		$heure 			= $mail['heure'];
		$sujet 			= 'Nouvelle réservation';
		$imessage 		= strip_tags($mail['message2']);
		
		// On retire toutes les balises HTML du message
		$message = "<br/>Voici les informations relatives à la réservation :<br/><br/>
		<b>Nom</b> : ".$nom."<br/>
		<b>E-mail</b> : ".$email."<br/>
		<b>Tél</b> : ".$tel."<br/><br/>
		<b>Service</b> : ".$service."<br/>
		<b>Nombre de couverts</b> : ".$nb_pers."<br/>
		<b>Date de réservation</b> : ".$ladate_fr."<br/>
		<b>Heure de réservation</b> : ".$heure."<br/><br/>
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
                    <h3>Réservation</h3>
                    <div class="line-break"></div>
                </div>
                <div class="description-section text-center">
                    <p>Vous souhaitez réserver une table dans notre établissement, veuillez prendre contact avec notre personnel par téléphone, e-mail ou encore via notre formulaire de réservation. Nous vous confirmerons votre demande dans les plus brefs délais.</p>
                </div>
            </div>
        </div>
        <div class="divcod30"></div>
        <div class="row">
			<div class="col-md-8 dark-section">

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
				require ("FormMail.php");
			}
			?>
			
			</div>
			<div class="col-md-4 dark-section" style="padding-top: 11px;">
				<div class="Contact-Info">
					<div class="Title-Contact">
						<h3>Addresse :</h3>
					</div>
					<div class="Block-Contact">
						<ul>
							<li>
								<i class="fa fa-map-marker"></i>
                <p>Avenue Albert 1er, 38<br />
                1332 Rixensart<br />
								Belgique</p>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<p>+32 2 652 57 06</p>
							</li>
							<li>
								<i class="fa fa-fax"></i>
								<p>+32 2 652 57 06</p>
							</li>
							<li>
								<i class="fa fa-envelope"></i>
								<p>contact@lelixirdessens.com</p>
							</li>
						</ul>	
					</div>					
				</div>
			</div>

        </div>
    </div>
</section>
		