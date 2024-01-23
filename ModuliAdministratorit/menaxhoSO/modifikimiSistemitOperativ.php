<?php
    include("../_konfigurimi.php");
    include("../_verifikimi.php");

    $idSistemitOperativ = $_GET['idso'];
    $pyetsori = "SELECT * FROM sistemetoperative_umsso WHERE id_sistemiOperativ_umsso='$idSistemitOperativ'";
    $rezultati = mysqli_query($lidhja, $pyetsori);

    while($rreshti = mysqli_fetch_array($rezultati)){
        $sistemiOperativ = $rreshti['sistemiOperativ_umsso'];
    }
?>
<?php
    include("../_konfigurimi.php");

    if(isset($_POST['dorezo'])){
        $idSistemitOperativ = $_POST['idso'];
        $sistemiOperativ = $_POST['sistemiOperativ'];

        if(empty($sistemiOperativ)){
            header("location: __teGjithaFushatObligative.php?idso=$idSistemitOperativ");
        } else{
            $pyetsori = "UPDATE sistemetoperative_umsso SET sistemiOperativ_umsso='$sistemiOperativ' WHERE id_sistemiOperativ_umsso=$idSistemitOperativ";
            $rezultati = mysqli_query($lidhja, $pyetsori);
            header('location: menaxhoSistemetOperative.php');
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
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>
<body class="is-preload">
    <div id="wrapper">
        <?php include("../_koka.php"); ?>	
        <?php include("../_menyjaPerFollderatMenaxho.php"); ?>

        <div id="main">
            <section id="content" class="main">
                <h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?>!</h2>
                <h2>MODIFIKO TË DHËNAT PËR SISTEMIN OPERATIV</h2>
                <hr>
                <form method="post" action="modifikimiSistemitOperativ.php" enctype="multipart/form-data">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Sistemi Operativ</h3>
                            </label>
                            <input type="text" name="sistemiOperativ" value="<?php echo $sistemiOperativ; ?>"/>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <!-- inputit te pare i eshte hequr li etiketa per arsyeje estetike, butoni submit po zhvendoset kur eshte li etiketa -->
                                <input type="hidden" name="idso" value='<?php echo $_GET['idso'];?>' />
                                <li><input type="submit" name="dorezo" value="Modifiko Sistemin Operativ" class="button primary fit" style="background-color: #2c2c2c;" /></li>
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