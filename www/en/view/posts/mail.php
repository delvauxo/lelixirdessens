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
		
		if (!isSet($mail['nom']))
		{echo "No name !"; return false;}
		else $mail['nom'] = htmlSpecialChars($mail['nom']);
		
		if (!isSet($mail['prenom']))
		{echo "No first name !"; return false;}
		else $mail['prenom'] = htmlSpecialChars($mail['prenom']);
		
		if (!isSet($mail['eadress']))
		{echo "No e-mail address !"; return false;}
		else $mail['eadress'] = htmlSpecialChars($mail['eadress']);
		
		if (!isSet($mail['phone']))
		{echo "No phone number !"; return false;}
		else $mail['phone'] = htmlSpecialChars($mail['phone']);
		
		if (!isSet($mail['message']))
		{echo "No message !"; return false;}
		else $mail['message'] = htmlSpecialChars($mail['message']);
		
		// On vérifie que les données sont pas vides
		if (empty($mail['nom']))
		{echo "Name empty !"; return false;}
		if (empty($mail['prenom']))
		{echo "First name empty !"; return false;}
		if (empty($mail['eadress']))
		{echo "E-mail address empty !"; return false;}
		if (empty($mail['phone']))
		{echo "Phone number empty !"; return false;}
		if (empty($mail['message']))
		{echo "Message empty !"; return false;}	
		
		// Maintenant on peut/doit également faire des controles
		// sur des valeurs attendues: nom, sujet, message.
		// Voir les exercices pour les suggestions.
		
		return true;
	}


	// CONNECT.PHP

	// Fichier contenant les définitions de constantes
	// pour la connexion à MySQL

	define ('NOM', "poivreetsal");
	define ('PASSE', "9sqmx7R6");
	define ('SERVEUR', "mysql51-60.pro");
	define ('BASE', "poivreetsal");


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
		$nom = mysql_real_escape_string($mail['nom']);
		$prenom = mysql_real_escape_string($mail['prenom']);
		$email = mysql_real_escape_string($mail['eadress']);
		$phone = mysql_real_escape_string($mail['phone']);
		$message = mysql_real_escape_string($mail['message']);
		
		// Création et exécution de la requête
		
		$requete = "INSERT INTO contacts(nom, prenom, eadress, phone, message, date_envoi) "
			. "VALUES ('$nom', '$prenom', '$email', '$phone', '$message', NOW())";
			
			ExecRequete ($requete, $connexion);
	}


	// AFFICHEMAIL.PHP

	// AfficheMail à concevoir sois même...

	function AfficheMail ($mail)
	{
		
		// Extraction des paramètres
		$nom = $mail['nom'];
		$prenom = $mail['prenom'];
		$email = $mail['eadress'];
		$phone = $mail['phone'];
		
		// On retire toutes les balises HTML du message
		$message = strip_tags($mail['message']);
		
		echo "<br/>Your informations :<br/><br/>
						Name : <b>$nom</b><br/>
						First name : <b>$prenom</b><br/>
						Phone : <b>$phone</b><br/>
						E-mail : <b>$email</b><br/><br/><br/>";

		echo "Your Message :<br/>
					<b>$message</b><br><br>
					has been sent to the following e-mail address :<br/>
					<b>info@poivre-et-sel.be</b><br/><br/><br/>";
	}	


	// ENVOIMAIL.PHP

	// Fonction envoyant un e-mail. On suppose
	// que les controles ont été effectués avant l'appel à la 
	// fonction

	function EnvoiMail ($mail)
	{
		// Extraction des paramètres
		$destinataire = 'info@poivre-et-sel.be';
		$nom = $mail['nom'];
		$prenom = $mail['prenom'];
		$phone = $mail['phone'];
		$email = $mail['eadress'];
		$sujet = 'Nouvelle demande de contact';
		$imessage = strip_tags($mail['message']);
		
		// On retire toutes les balises HTML du message
		$message = "<br/>Voici les informations relatives à la demande de contact :<br/><br/>
		<b>Nom</b> : ".$nom."<br/>
		<b>Prenom</b> : ".$prenom."<br/>
		<b>Tél</b> : ".$phone."<br/>
		<b>E-mail</b> : ".$email."<br/><br/>
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


<?php $title_for_layout = 'Poivre et Sel - Contact' ?>

<div class="rounded-shadow" style="text-align: justify; padding: 20px; color:#808080; margin-bottom: 10px;">
	<div style="font-size: 18px; font-family: arial; padding-left: 15px; padding-top: 20px;">
		<b>Contact :</b>
		<br/>
	</div>
	<div style="text-align: justify; padding: 15px; line-height: 130%; font-size: 14px;">

	
	<?php
	
	// Ajout au fichier cfg l'adresse SMPT de SKYNET qui permet d'envoyer outre LOCALHOST
	ini_set('SMTP','relay.skynet.be');	
	
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
</div>

		