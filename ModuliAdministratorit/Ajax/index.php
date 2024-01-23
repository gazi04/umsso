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
		<div id="main">
			<section id="first" class="main special" style="margin-top: 5em;">
				<header class="major">
					<h2>Përshëndetje, <?php include_once("../_verifikimi.php"); echo $perdoruesi_kyqur;?>! <br> Kjo është forma e votimit.</h2>
				</header>
				<div id="permbajtjaVotimit"></div>
			</section>
		</div>

		<?php include("../_fundiFaqes.php"); ?>	
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="jquery-3.2.1.min.js"></script>
	<script>
		function tregoVotimin(){
			$.ajax({
				type: "POST", 
				url: "tregoVotimin.php", 
				processData : false,
				success: function(responseHTML){
					$("#permbajtjaVotimit").html(responseHTML);
				}
			});
		}
		function shtoVotimin() {
			if($("input[name='answer']:checked").length != 0){
				var answer = $("input[name='answer']:checked").val();
				$.ajax({
					type: "POST", 
					url: "ruajVotimin.php", 
					data : "question="+$("#question").val()+"&answer="+$("input[name='answer']:checked").val(),
					processData : false,
					success: function(responseHTML){
						$("#permbajtjaVotimit").html(responseHTML);				
					}
				});
				
			}
		}
		$(document).ready(function(){
			tregoVotimin();
		});
	</script>
</body>
</html>