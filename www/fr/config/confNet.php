<?php

class Conf{

	static $debug = 1; 
	static $databases = array(
		'default' => array(
		'host'		=> 'lelixirdvlweb.mysql.db',
		'database'	=> 'lelixirdvlweb',
		'login'		=> 'lelixirdvlweb',
		'password'	=> '9sqmx7R6'
		)
	);
}

Router::prefix('cockpit','admin');

// Ré-écriture d'url
// Exemple : 
// si url vaut "posts/usines" => remplacer par "usines"
Router::connect('','posts/index');
Router::connect('carte','carte/carte');
Router::connect('lunch','lunch/lunch');
Router::connect('menus','menus/menus');
Router::connect('photos','posts/portfolio');
Router::connect('reservation','posts/reservation');
Router::connect('reservationOK','posts/mailReservation');
Router::connect('contact','posts/contact');
Router::connect('contactOK','posts/mail2');

Router::connect('cockpit','cockpit/posts/welcome');
Router::connect('page/:slug-:id','pages/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('actualite/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('category/:slug','posts/category/slug:([a-z0-9\-]+)');

// Permet le download de fichier (download box) grace au fichier telecharge.php
Router::connect('telecharge','posts/telecharge');

// Admin section
// Router::connect('customers','posts/customers');
