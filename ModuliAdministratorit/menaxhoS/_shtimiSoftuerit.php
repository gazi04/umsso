<?php
include("../_konfigurimi.php");

if (isset($_POST["dorezo"])){
	$emriSoftuerit = $_POST["softueri"];
	$gjuhetProgramuese = $_POST["gjuhetProgramueseTeSoftuerit"];
	$idSistemitOperativ = $_POST["idSistemitOperativ"];
	$fotoja = addslashes(file_get_contents($_FILES['fajlli']['tmp_name']));
	$emriFotos = $_FILES['fajlli']['name'];
	$pyetsori = "INSERT INTO `softueret_umsso`(`softueri_umsso`, `gjuhetProgramuese_umsso`, `id_sistemiOperativ_umsso`, `fotoja_umsso`, `emriFotos_umsso`) 
	VALUES ('$emriSoftuerit','$gjuhetProgramuese','$idSistemitOperativ','$fotoja','$emriFotos')";

	// https://www.w3schools.com/php/php_file_upload.asp
	if ($_FILES['fajlli']['size'] > 3000000){
		$dokumenti = 
		'<!DOCTYPE HTML>
		<!--
			Stellar by HTML5 UP
			html5up.net | @ajlkn
			Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
		-->
		<html>
		<head>
			<title>UMSSO</title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="../assets/css/main.css" />
			<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		</head>
		<body class="is-preload">
			<div id="wrapper">
				<header id="header">
					<h1>Fotoja dhënë nga ju është shumë e madhe, dhe nuk mund të ruhet në databazë.</h1>
				</header>				
			</div>
		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		</body>
		</html>';

	}else if (empty($emriSoftuerit) || empty($gjuhetProgramuese) || empty($idSistemitOperativ)){
		//header("shfaqjaGabimeve.php?mesazhi='Të gjitha fushat duhen të jenë të mbushura.'");
		// echo "<script>window.location.href = 'menaxhoSoftueret.php';</script>";
		// return false;
		$dokumenti = 
		'<!DOCTYPE HTML>
		<!--
			Stellar by HTML5 UP
			html5up.net | @ajlkn
			Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
		-->
		<html>
		<head>
			<title>UMSSO</title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="../assets/css/main.css" />
			<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		</head>
		<body class="is-preload">
			<div id="wrapper">
				<header id="header">
					<h1>Të gjitha fushat duhen të jenë të mbushura.</h1>
				</header>				
			</div>
		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		</body>
		</html>';
	} else{
		$dokumenti = '
		<!DOCTYPE HTML>
		<!--
		Stellar by HTML5 UP
		html5up.net | @ajlkn
			Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
		-->
		<html>
		<head>
			<title>UMSSO</title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="../assets/css/main.css" />
			<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		</head>
		<body class="is-preload">
			<div id="wrapper">
				<header id="header">
					<h1>Ju lutem prisni 5 sekonda.</h1>
					<p>Të dhënat janë duke u ruajtur në databazë.</p>
				</header>				
			</div>
		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		</body>
		</html>';
		mysqli_query($lidhja, $pyetsori);
	}

	echo "<script>
		setTimeout(function(){
		window.location.href = 'menaxhoSoftueret.php';
	}, 4500);
	</script>";
	echo $dokumenti;
}
?>