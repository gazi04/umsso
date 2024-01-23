<?php
include("../_konfigurimi.php");

if (isset($_POST['dorezo'])) {
	$emriSO = $_POST['emriSO'];

	if (empty($emriSO)) {
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
					<h1>Fusha për emrin e sistemit operativ nuk duhet të jetë e zbrazët.</h1>
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
	} else {
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
					<p>Të dhënat janë duke u ruajtur tek databaza.</p>
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
		$pyetsori = "INSERT INTO sistemetoperative_umsso(sistemiOperativ_umsso) VALUE('$emriSO');";
		mysqli_query($lidhja, $pyetsori);
	}
	echo 
    "<script>
        setTimeout(function(){
            window.location.href = 'menaxhoSistemetOperative.php';
        }, 2500);
    </script>";
    echo $dokumenti;
}
?>