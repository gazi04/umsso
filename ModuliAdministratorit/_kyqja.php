<?php
	session_start();
	include("_konfigurimi.php"); 
	
	if(isset($_POST["dorezo"])) {
		if(empty($_POST["emri_perdoruesit"]) || empty($_POST["fjalekalimi"])) {
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
					<link rel="stylesheet" href="assets/css/main.css" />
					<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
				</head>
				<body class="is-preload">
					<div id="wrapper">
						<header id="header">
							<h1>Duhen të plotësohen të gjitha fushat.</h1>
							<p>Ju lutem prisni 3 sekonda</p>
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

				echo
				"<script>
					setTimeout(function(){
						window.location.href = 'index.php';
					}, 2500);
				</script>";
			echo $dokumenti;
		}else {
			$emri = $_POST['emri_perdoruesit'];
			$fjalekalimi = $_POST['fjalekalimi'];
			$pyetsori = "SELECT id_perdoruesi_umsso FROM perdoruesit_umsso WHERE perdoruesi_umsso='$emri' 
			and fjalekalimi_umsso='$fjalekalimi'";
			$rezultati = mysqli_query($lidhja, $pyetsori);
			$rreshti = mysqli_fetch_array($rezultati,MYSQLI_ASSOC);

			if(mysqli_num_rows($rezultati) == 1)
			{
				$_SESSION['emriPerdoruesit'] = $emri; 
				header("location: ballina.php"); 
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
				<link rel="stylesheet" href="assets/css/main.css" />
				<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
				</head>
				<body class="is-preload">
				<div id="wrapper">
				<header id="header">
				<h1>Keni dhënë emri apo fjalëkalimi gabim.</h1>
				<p>Ky përdorues nuk gjendet në databazë, ju lutem prisni 5 sekonda.</p>				
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

				echo
				"<script>
					setTimeout(function(){
						window.location.href = 'index.php';
					}, 4500);
				</script>";
			echo $dokumenti;
			}
		}
	}
?>
