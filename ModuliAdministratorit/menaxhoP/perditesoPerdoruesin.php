<?php
include("../_konfigurimi.php");
include("../_verifikimi.php");

$idp = $_GET['idp'];
$pyetsori = "SELECT * FROM perdoruesit_umsso WHERE id_perdoruesi_umsso='$idp'";
$rezultati = mysqli_query($lidhja, $pyetsori);

while ($rreshti = mysqli_fetch_array($rezultati)) {
    $perdoruesiPerFormularin = $rreshti['perdoruesi_umsso'];
    $fjalekalimiPerFormularin = $rreshti["fjalekalimi_umsso"];
}
?>
<?php
include("../_konfigurimi.php");

if (isset($_POST['dorezo'])) {
    $idPerdoruesit = $_POST['idp'];
    $perdoreusi = $_POST['emriPerdoruesit'];
    $fjalekalimi = $_POST['fjalekalimiPerdoruesit'];

    if (empty($perdoreusi) || empty($fjalekalimi)) {
        header("location: __teGjithaFushatObligative.php?idp=$idPerdoruesit");
    } else{
        $pyetsoriPerModifikim = "UPDATE `perdoruesit_umsso` SET `perdoruesi_umsso`='$perdoruesi',`fjalekalimi_umsso`='$fjalekalimi' WHERE `id_perdoruesi_umsso`='$idPerdoruesit'";
        mysqli_query($lidhja, $pyetsoriPerModifikim);
        header("location: menaxhoPerdoruesit.php");
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
                    <h2>Përshëndetje, <?php echo $perdoruesi_kyqur; ?> modifiko të dhënat për përdoruesin</h2>
                </header>

                <form method="post" action="perditesoPerdoruesin.php">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Emri Përdoruesit:</h3>
                            </label>
                            <input type="text" value="<?php echo $perdoruesiPerFormularin; ?>" name="emriPerdoruesit" />
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Fjalëkalimi Përdoruesit:</h3>
                            </label>
                            <input type="text" value="<?php echo $fjalekalimiPerFormularin; ?>" name="fjalekalimiPerdoruesit" />
                            <input type="hidden" name="idp" value='<?php echo $_GET['idp']; ?>' />
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" name="dorezo" value="Përditëso" class="button primary fit" style="background-color: #4356ff;" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
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