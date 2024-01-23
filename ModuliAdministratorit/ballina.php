<?php
	include("_verifikimi.php");
?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Ballina Administratorit</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
	<div id="wrapper">
		<?php include("_koka.php"); ?>	
		<?php include("_menyjaPerBallinen.php"); ?>

		<div id="main">
			<section id="first" class="main special">
				<header class="major">
					<h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?> ky është moduli administratorit.</h2>
				</header>
				<ul class="features">
					<li>
						<a href="menaxhoS/menaxhoSoftueret.php">
							<span class="icon solid major style1 fa-code"></span>
							<h3>Menaxho Softuerët</h3>
						</a>
					</li>
					<li>
						<a href="menaxhoSO/menaxhoSistemetOperative.php">
							<span class="icon solid major style1 fa-desktop"></span>
							<h3>Menaxho Sistemet Operative</h3>
						</a>
					</li>
					<li>
						<a href="menaxhoTD/modifikoTeDhenat.php">
							<span class="icon solid major style1 fa-copy"></span>
							<h3>Menaxho Të Dhënat</h3>
						</a>
					</li>
				</ul>
				<a style="background-color:#2c2c2c; font-size:25px;" href="Ajax/index.php" class="button"><span style="color: #ffffff;">VOTO</span></a>
			</section>
		</div>

		<?php include("_fundiFaqes.php"); ?>	
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>