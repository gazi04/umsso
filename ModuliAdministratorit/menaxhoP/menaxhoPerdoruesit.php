<?php include("../_verifikimi.php");?>

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
	<link rel="stylesheet" href="../assets/css/fontawesome-all.min.css" />
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
	<div id="wrapper">
		<?php include("../_koka.php"); ?>	
		<?php include("../_menyjaPerMenaxhoP.php"); ?>

		<div id="main">
			<section id="first" class="main special">
				<header class="major">
					<h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?>!</h2>
					<p>Këtu mund të menaxhosh të dhënat për përdoruesit me të drejta administratoriale.</p>
				</header>
				<ul class="features">
					<li>
						<a href="shtimiPerdoruesit.php" style="text-decoration: none;">
							<span class="icon solid major style1 fa-plus"></span>
							<h3>Shto Përdorues</h3>
						</a>
					</li>
					<li>
						<a href="modifikimiPerdoruesit.php">
							<span class="icon solid major style3 fa-edit"></span>
							<h3>Modifiko Përdorues</h3>
						</a>
					</li>
					<li>
						<a href="fshirjaPerdoruesit.php">
							<span class="icon solid major style5 fa-eraser"></span>
							<h3>Fshijë Përdorues</h3>
						</a>
					</li>
				</ul>
			</section>
		</div>

		<?php include("../_fundiFaqes.php"); ?>	
	</div>

	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.scrollex.min.js"></script>
	<script src="../assets/js/jquery.scrolly.min.js"></script>
	<script src="../assets/js/browser.min.js"></script>
	<script src="../assets/js/breakpoints.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<script src="../assets/js/main.js"></script>
</body>
</html>