<?php
include("../_konfigurimi.php");
include("../_verifikimi.php");

if(isset($_POST["dorezo"])){
    $emri = $_POST["emriPerdoruesit"];
    $fjalekalimi = $_POST["fjalekalimi"];

	if(empty($emri) || empty($fjalekalimi)){
        header("location: __teGjithaFushatObligative.php");
	}else{
		$pyetsori = "INSERT INTO `perdoruesit_umsso`(`perdoruesi_umsso`, `fjalekalimi_umsso`) VALUES ('$emri','$fjalekalimi')";
		mysqli_query($lidhja, $pyetsori);
		header("location: __teDhenatJaneDukeURuajtur.php");
		
	}
}
?>

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
		<?php include("../_koka.php"); ?>	
		<?php include("../_menyjaPerFollderatMenaxho.php"); ?>

		<div id="main">
			<section id="first" class="main special">
				<header class="major">
					<h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?> shto të dhënat për përdoruesin</h2>
				</header>
				<section id="content" class="main">
					<form method="post" action="#">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-small">
								<label for="demo-priority-high">Emri Përdoruesit</label>
								<input type="text" name="emriPerdoruesit"/>
							</div>
							<div class="col-6 col-12-small">
								<label for="demo-priority-high">Fjalëkalimi Përdoruesit</label>
								<input type="text" name="fjalekalimi"/>
							</div>  
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" name="dorezo" value="Shto Përdoruesin" class="button primary fit" style="background-color: #2c2c2c;"/></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
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