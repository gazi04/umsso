<?php
include("../_konfigurimi.php");

if(isset($_POST['dorezo'])){
    $idd = $_POST['idd'];
    $titulliIRi = $_POST['titulli'];
    $pershkrimiIRi = $_POST['pershkrimi'];
    $pjesafaqesIRi = $_POST['pjesafaqes'];

    if(empty($titulliIRi) || empty($pershkrimiIRi) || empty($pjesafaqesIRi)){
        header("location: __teGjithaFushatObligative.php?idd=$idd");
    }else {
        $pyetsori = "UPDATE `tedhenat_umsso` SET `titulli_umsso`='$titulliIRi',`pershkrimi_umsso`='$pershkrimiIRi',`pjesaFaqes_umsso`='$pjesafaqesIRi' WHERE id_eDhena_umsso='$idd'";
        mysqli_query($lidhja, $pyetsori);
        header("location:modifikoTeDhenat.php");
    }
}
?>
<?php
include("../_konfigurimi.php");
include("../_verifikimi.php");

$idEDhena = $_GET['idd'];
$rezultati = mysqli_query($lidhja,"SELECT * FROM tedhenat_umsso WHERE id_EDhena_umsso=$idEDhena");

while($rreshti = mysqli_fetch_array($rezultati))
{
	$titulli = $rreshti['titulli_umsso'];
	$pershkrimi = $rreshti['pershkrimi_umsso'];
	$pjesaFaqes = $rreshti['pjesaFaqes_umsso'];
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
            <section id="content" class="main">
                <h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?>!</h2>
                <h2>MODIFIKO TË DHËNAT</h2>
                <hr>
                <form method="post" action="perditesoTeDhenat.php" enctype="multipart/form-data">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Titulli</h3>
                            </label>
                            <input type="text" name="titulli" value="<?php echo $titulli; ?>"/>
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Pershkrimi</h3>
                            </label>
                            <textarea name="pershkrimi" rows="10" cols="30"><?php echo $pershkrimi; ?></textarea>
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Pjesa e Faqes</h3>
                            </label>
                            <input type="text" name="pjesafaqes" value="<?php echo $pjesaFaqes; ?>"/>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <!-- inputit te pare i eshte hequr li etiketa per arsyeje estetike, butoni submit po zhvendoset kur eshte li etiketa -->
                                <input type="hidden" name="idd" value='<?php echo $_GET['idd'];?>' />
                                <li><input type="submit" name="dorezo" value="Përditëso Të Dhënat" class="button primary fit" style="background-color: #2c2c2c;" /></li>
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

