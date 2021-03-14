<?php

use App\Helpers\Request;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?? 'Dashboard'; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
	<link rel="stylesheet" href="css/styles.css">
	<?php
	if (isset($css)) {
		foreach($css as $stylesheet) {
			echo "<link rel=\"stylesheet\" href=\"{$stylesheet}\">";
		}
	}
	?>

	<meta name="msapplication-TileImage" content="/images/favicons/win8-tile-144.png"/>
	<meta name="msapplication-TileColor" content="#1f379d"/>
	
	<link rel="shortcut icon" href="/images/favicons/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon-192x192.png" sizes="192x192">

</head>

<body class="loggedin">

    <?php
	include 'navigation.view.php';
	?>

	<div id="main-wrapper">


		<main>

			<header class="header-bar">
				<?php
					if (isset($heading)) {
						echo "<h1>{$heading}</h1>";
					} else if (isset($back)) {
						echo "<a class=\"back\" href=\"{$back}\"><i class=\"fas fa-arrow-circle-left fa-2x\"></i></a>";
					}
				?>
			</header>

			<section class="content">