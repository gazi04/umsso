<?php
include("../_konfigurimi.php");
include("../_verifikimi.php");
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
            <section id="first" class="main">
                <h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?>!</h2>
                <h2>SHTO TË DHËNAT PËR SOFTUERIN</h2>
                <hr>
                <form method="post" action="_shtimiSoftuerit.php" enctype="multipart/form-data">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Softueri</h3>
                            </label>
                            <input type="text" name="softueri" />
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Gjuhët Programuese</h3>
                            </label>
                            <input type="text" name="gjuhetProgramueseTeSoftuerit" />
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Zgjedh Sistemin Operativ</h3>
                            </label>
                            <select name="idSistemitOperativ" id="demo-category">
                                <?php
                                include("../_konfigurimi.php");
                                $pyetsori = "SELECT * FROM sistemetoperative_umsso";
                                $rezultati = mysqli_query($lidhja, $pyetsori);
                                while ($rreshti = mysqli_fetch_array($rezultati)) {
                                    echo "<option value=" . $rreshti['id_sistemiOperativ_umsso'] . ">" . $rreshti['sistemiOperativ_umsso'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Fotoja</h3>
                            </label>
                            <input name="fajlli" type="file" required />
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" name="dorezo" value="Shto Softuerin" class="button primary fit" style="background-color: #2c2c2c;" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <hr>
                <h2>KËRKO TË DHËNAT PËR SOFTUERËT</h2>
                <hr>

                <form method="post" action="#">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <label style="text-align: left;">
                                <h3>Kërko:</h3>
                            </label>
                            <input type="text" value="%" name="termi" />
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Kërko" class="button primary fit" style="background-color: #2c2c2c;" /></li>
                            </ul>
                        </div>
                    </div>
                </form>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Softueri</th>
                                <th>Gjuhët Programuese</th>
                                <th>Sistemi Operativ</th>
                                <th>Fotoja</th>
                                <th>Emri Fotos</th>
                                <th>Modifiko</th>
                                <th>Fshijë</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_REQUEST['termi'])) {

                                $termi = mysqli_real_escape_string($lidhja, $_REQUEST['termi']);
                                $pyetsori = mysqli_query($lidhja, "SELECT s.id_softueri_umsso, s.softueri_umsso, s.gjuhetProgramuese_umsso, so.sistemiOperativ_umsso, s.fotoja_umsso, s.emriFotos_umsso 
                                    FROM softueret_umsso s INNER JOIN sistemetoperative_umsso so ON s.id_sistemiOperativ_umsso = so.id_sistemiOperativ_umsso
                                    WHERE s.softueri_umsso LIKE '%" . $termi . "%' || s.gjuhetProgramuese_umsso LIKE '%" . $termi . "%' || so.sistemiOperativ_umsso LIKE '%" . $termi . "%'");

                                while ($rreshti = mysqli_fetch_array($pyetsori)) {
                                    echo "<tr>";
                                    echo "<td>" . $rreshti['softueri_umsso'] . "</td>";
                                    echo "<td>" . $rreshti['gjuhetProgramuese_umsso'] . "</td>";
                                    echo "<td>" . $rreshti['sistemiOperativ_umsso'] . "</td>";
                                    echo "<td>";
                                    echo '<img src="data:foto/jpeg;base64,'.base64_encode( $rreshti['fotoja_umsso'] ).'" width="80%">'; 
                                    echo "</td>";
                                    echo "<td>" . $rreshti['emriFotos_umsso'] . "</td>";
                                    echo "<td><a class='button primary small' style='background-color: #2c2c2c;' href=\"modifikimiSoftuerit.php?ids=$rreshti[id_softueri_umsso]\">Modifiko</a></td>";
                                    echo "<td><a class='button primary small' style='background-color: #2c2c2c;' href=\"_fshirjaSoftuerit.php?ids=$rreshti[id_softueri_umsso]\" onClick=\"return confirm('Jeni të sigurt që dëshironi ta fshini?')\">Fshij</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                $pyetsori = mysqli_query($lidhja, "SELECT s.id_softueri_umsso, s.softueri_umsso, s.gjuhetProgramuese_umsso, so.sistemiOperativ_umsso, s.fotoja_umsso, s.emriFotos_umsso 
                                    FROM softueret_umsso s INNER JOIN sistemetoperative_umsso so ON s.id_sistemiOperativ_umsso = so.id_sistemiOperativ_umsso");

                                while ($rreshti = mysqli_fetch_array($pyetsori)) {
                                    echo "<tr>";
                                    echo "<td>" . $rreshti['softueri_umsso'] . "</td>";
                                    echo "<td>" . $rreshti['gjuhetProgramuese_umsso'] . "</td>";
                                    echo "<td>" . $rreshti['sistemiOperativ_umsso'] . "</td>";
                                    echo "<td>";
                                    echo '<img src="data:foto/jpeg;base64,'.base64_encode( $rreshti['fotoja_umsso'] ).'" width="80%">'; 
                                    echo "</td>";
                                    echo "<td>" . $rreshti['emriFotos_umsso'] . "</td>";
                                    echo "<td><a class='button primary small' style='background-color: #2c2c2c;' href=\"modifikimiSoftuerit.php?ids=$rreshti[id_softueri_umsso]\">Modifiko</a></td>";
                                    echo "<td><a class='button primary small' style='background-color: #2c2c2c;' href=\"_fshirjaSoftuerit.php?ids=$rreshti[id_softueri_umsso]\" onClick=\"return confirm('Jeni të sigurt që dëshironi ta fshini?')\">Fshij</a></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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