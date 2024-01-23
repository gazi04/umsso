<?php
    // include('_kyqja.php');
	include('_konvertuesiMYSQLneJSON.php');
    if(isset($_SESSION['emriPerdoruesit']) != ""){
        header("location: ballina.php");
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
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<script src="jquery.js"></script>
	<script>
		$(document).ready(function () {
			$.getJSON("teDhenatPerKouten.json", function (eDhena) {

				var elementiVargut = [];
					$.each(eDhena, function (indeks, vlera) {
					elementiVargut.push(vlera);
				});

				var kolona = [];
				for (var i = 0; i < elementiVargut.length; i++) {
					for (var qelsi in elementiVargut[i]) {
						if (kolona.indexOf(qelsi) === -1) {
							kolona.push(qelsi);
						}
					}
				}

				var tabela = document.createElement("table");

				var rreshtiTabeles = tabela.insertRow(-1);

				for (var i = 0; i < elementiVargut.length; i++) {

					rreshtitabeles = tabela.insertRow(-1);

					for (var j = 0; j < kolona.length; j++) {
						var qelizaTabeles = rreshtitabeles.insertCell(-1);
						qelizaTabeles.innerHTML = elementiVargut[i][kolona[j]];
					}
				}

				var kouta = document.getElementById("kuota");
				kouta.innerHTML = "";
				kouta.appendChild(tabela);
			});
		});
	</script>
</head>
<body class="is-preload">
	<div id="wrapper">
		<?php include("_koka.php"); ?>	

		<div id="main">
			<section id="content" class="main">
				<section>
					<h2>Formulari i kyçjes</h2>
					<blockquote id="kuota"></blockquote>
					<hr>
					<form method="post" action="_kyqja.php">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<label style="text-align: left;">
									<h3>Emri</h3>
								</label>
								<input type="text" name="emri_perdoruesit"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<label style="text-align: left;">
									<h3>Fjalëkalimi</h3>
								</label>
								<input type="password" name="fjalekalimi" />
							</div>  
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" name="dorezo" value="Kyqu" class="button" style="background-color: #2c2c2c; color: #f1f1f1 !important; font-weight: bold;" /></li>
								</ul>
							</div>
						</div>
					</form>
				</section>
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