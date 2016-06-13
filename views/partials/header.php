<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= URL ?>src/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= URL ?>src/css/style.css">
	<link rel="stylesheet" href="<?= URL ?>src/css/jquery-jvectormap-2.0.3.css">
</head>
<body class="page-<?= $class ?>">

	<header>
		<div class="container">

			<h1>Mon site</h1>

			<nav class="navbar navbar-inverse">
				<ul class="nav navbar-nav">
				<a class="navbar-brand" href="#"><?php echo "$class" ?></a>
				<li><a href="<?= URL ?>">Home</a></li>
				<li><a href="<?= URL ?>about">About</a></li>
				<li><a href="<?= URL ?>news">News</a></li>
				<?php if(empty($_SESSION['auth'])):?>
				<li><a href="<?= URL ?>inscription">Inscription</a></li>
				<li><a href="<?= URL ?>login">login</a></li>
				<?php endif; ?>
		</ul>

				<?php if(!empty($_SESSION['auth'])):?>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Bonjour <?= $_SESSION['auth']->name ?></a></li>
			<li><a href="<?= URL ?>logout">Déconnexion</a></li>
		</ul>
				<?php endif; ?>
	</nav>
</div>
</header>


<div class="container">
