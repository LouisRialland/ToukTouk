<?php

// Config
include 'config/options.php';
include 'config/database.php'; // Uncomment if you need database
include 'src/includes/helpers.php';

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];



// Routes
if($q == '')
	$page = 'home';
else if($q == 'about')
	$page = 'about';
else if($q == 'news')
	$page = 'news';
else if(preg_match('/^news\/[-a-z0-9]+$/',$q)) // news/mon-titre-d-actualite
	$page = 'news-single';
else if($q == 'inscription') // news/mon-titre-d-actualite
	$page = 'inscription';
else if($q == 'login')
	$page = 'login';
else if($q == 'confirm')
  $page = 'confirm';
else if($q == 'logout')
  $page = 'logout';
else
	$page = '404';


// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/header.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
