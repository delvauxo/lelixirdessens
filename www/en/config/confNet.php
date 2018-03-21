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


// Permet de cacher l'accès admin en tapant autre chose que admin (SECURITE)
Router::prefix('cockpit','admin');

// Ré-écriture d'url
// Exemple : 
// si url vaut "posts/usines" => remplacer par "usines"
// Page Accueil (laisser vide si on ne veut rien)
Router::connect('','posts/index');

// Page supplémentaires du site
Router::connect('','posts/index');
Router::connect('menu','posts/menu');
Router::connect('lunch','posts/lunch');
Router::connect('gmenu','posts/gmenu');
Router::connect('gallery','posts/gallery');
Router::connect('booking','posts/booking');
Router::connect('contact','posts/contact');


// Acces zone admin
Router::connect('cockpit','cockpit/posts/welcome');

// Ré-écriture d'URL pour les pages, pour les posts (blog) et pour les cats
Router::connect('page/:slug-:id','pages/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('actualite/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('category/:slug','posts/category/slug:([a-z0-9\-]+)');

// Permet le download de fichier (download box) grace au fichier telecharge.php
Router::connect('telecharge','posts/telecharge');

// Admin section
// Router::connect('customers','posts/customers');

