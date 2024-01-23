<?php
include("../_konfigurimi.php");

$idSistemitOperativ = $_GET['idso'];
$pyetsori = "SELECT `id_sistemiOperativ_umsso` FROM `softueret_umsso` WHERE `id_sistemiOperativ_umsso` = $idSistemitOperativ;";
$rezulati = mysqli_query($lidhja, $pyetsori);
if(mysqli_num_rows($rezulati) == 0){
    mysqli_query($lidhja, "DELETE FROM sistemetoperative_umsso WHERE id_sistemiOperativ_umsso=$idSistemitOperativ");
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
				<h1>Ju lutem prisni 3 sekonda.</h1>
				<p>Të dhënat janë duke u fshirë nga databaza.</p>
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
    echo "<script>
         setTimeout(function(){
            window.location.href = 'menaxhoSistemetOperative.php';
         }, 2500);
      </script>";
	echo $dokumenti;
}else{ 
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
				<h1>Ky sistem operativ që dëshironi të fshini nuk mund të hiqet nga databaza, së pari duhen të fshihen të gjitha softuerët me këtë sistem operativ.</h1>
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
    echo "<script>
         setTimeout(function(){
            window.location.href = 'menaxhoSistemetOperative.php';
         }, 8000);
      </script>";
	echo $dokumenti;
}

?>