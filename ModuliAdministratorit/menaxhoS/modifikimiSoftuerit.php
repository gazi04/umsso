<?php
include("../_konfigurimi.php");
include("../_verifikimi.php");

$idsoftuerit = $_GET['ids'];
$pyetsori = "SELECT * FROM softueret_umsso WHERE id_softueri_umsso='$idsoftuerit'";
$rezultati = mysqli_query($lidhja, $pyetsori);

while($rreshti = mysqli_fetch_array($rezultati)) {
    $softueri = $rreshti['softueri_umsso'];
    $gjuhetProgramuese = $rreshti["gjuhetProgramuese_umsso"];
}
?>
<?php
include("../_konfigurimi.php");

if(isset($_POST['dorezo'])){
    $idSoftueri = $_POST['ids'];
    $softueri = $_POST['softueri'];
    $gjuhetProgramuese = $_POST['gjuhetProgramuese'];
    $idSistemitOperativ = $_POST['idSistemitOperativ'];
    
    // kur formulari per modifikim eshte i zbrazet(emri i softuerit dhe gjuhet programuese)
    // do te kthen ne faqen per menaxhim te softuerve
    if(empty($softueri) || empty($gjuhetProgramuese)) {
        header("location: menaxhoSoftueret.php");
    }
    // ne rastin kur nuk zgjidhet nje sistem operativ dhe nuk zgjidhet nje foto
    else if ($idSistemitOperativ == "null" and empty($_FILES["fajlli"]["tmp_name"])) {
        $pyetsori = "UPDATE softueret_umsso SET softueri_umsso='$softueri', gjuhetProgramuese_umsso='$gjuhetProgramuese' WHERE id_softueri_umsso='$idSoftueri'";
        mysqli_query($lidhja, $pyetsori);
        header("location: menaxhoSoftueret.php");
    }
    // kur vendosim nje foto  
    else if(!empty($_FILES["fajlli"]["tmp_name"])) {
        $fotoja = addslashes(file_get_contents($_FILES["fajlli"]["tmp_name"]));
        $emriFotos = $_FILES["fajlli"]["name"];
        // nese kemi zgjidhur nje sistem operativ
        if($idSistemitOperativ != "null") {
            $pyetsori = "UPDATE softueret_umsso SET softueri_umsso='$softueri', gjuhetProgramuese_umsso='$gjuhetProgramuese', id_sistemiOperativ_umsso='$idSistemitOperativ', fotoja_umsso='$fotoja', emriFotos_umsso='$emriFotos'  WHERE id_softueri_umsso='$idSoftueri'";
        }
        // nese nuk kemi zgjidhur nje sistem operativ
        else {
            $pyetsori = "UPDATE softueret_umsso SET softueri_umsso='$softueri', gjuhetProgramuese_umsso='$gjuhetProgramuese', fotoja_umsso='$fotoja', emriFotos_umsso='$emriFotos'  WHERE id_softueri_umsso='$idSoftueri'";
        }

        // https://www.w3schools.com/php/php_file_upload.asp
        if($_FILES['fajlli']['size'] > 10000000) {
            echo "kjo foto e ngarkuar eshte shume e madhe";
            header("location: menaxhoSoftueret.php");
        }
        mysqli_query($lidhja, $pyetsori);
        header("location: menaxhoSoftueret.php");
    }
    else if($idSistemitOperativ != "null") {
        $pyetsori = "UPDATE softueret_umsso SET softueri_umsso='$softueri', gjuhetProgramuese_umsso='$gjuhetProgramuese', id_sistemiOperativ_umsso='$idSistemitOperativ' WHERE id_softueri_umsso='$idSoftueri'";
        mysqli_query($lidhja, $pyetsori);
        header("location: menaxhoSoftueret.php");
    }
    header("location: menaxhoSoftueret.php");
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
                <h2>MODIFIKO TË DHËNAT PËR SOFTUERIN</h2>
                <hr>
                <form method="post" action="modifikimiSoftuerit.php" enctype="multipart/form-data">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Softueri</h3>
                            </label>
                            <input type="text" name="softueri" value="<?php echo $softueri; ?>"/>
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Gjuhët Programuese</h3>
                            </label>
                            <input type="text" name="gjuhetProgramuese" value="<?php echo $gjuhetProgramuese; ?>" />
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Sistemin Operativ</h3>
                            </label>
                            <select name="idSistemitOperativ" id="demo-category">
                                <option selected="selected" value="null">Zgjedh Sistemin Operativ</option>
                                <?php
                                include("../_konfigurimi.php");
                                $pyetsori = "SELECT * FROM sistemetoperative_umsso";
                                $rezultati = mysqli_query($lidhja, $pyetsori);
                                while ($rreshti = mysqli_fetch_array($rezultati)) {
                                    echo "<option value=". $rreshti['id_sistemiOperativ_umsso'] .">". $rreshti['sistemiOperativ_umsso'] ."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Fotoja</h3>
                            </label>
                            <input name="fajlli" type="file" />
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <!-- inputit te pare i eshte hequr li etiketa per arsyeje estetike, butoni submit po zhvendoset kur eshte li etiketa -->
                                <input type="hidden" name="ids" value='<?php echo $_GET['ids'];?>' />
                                <li><input type="submit" name="dorezo" value="Modifiko Softuerin" class="button primary fit" style="background-color: #2c2c2c;" /></li>
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