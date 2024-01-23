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
            <section id="content" class="main">
                <h2>Përshëndetje, <?php echo $perdoruesi_kyqur;?>!</h2>
                <h2>KËRKO TË DHËNAT PËR MODIFIKIM</h2>
                <hr>

                <form method=" post" action="#">
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
                                <th>Titulli</th>
                                <th>Pershkrimi</th>
                                <th>Pjesa e Faqes</th>
                                <th>Modifiko</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($_REQUEST['termi'])) {

                                $termi = mysqli_real_escape_string($lidhja, $_REQUEST['termi']);
                                $pyetsori = mysqli_query($lidhja, "SELECT * FROM tedhenat_umsso WHERE titulli_umsso LIKE '%" . $termi . "%' OR  pjesaFaqes_umsso LIKE '%" . $termi . "%'");

                                while ($rreshti = mysqli_fetch_array($pyetsori)) {
                                    echo "<tr>";
                                    echo "<td>" . $rreshti['titulli_umsso'] . "</td>";
                                    echo "<td>" . $rreshti['pershkrimi_umsso'] . "</td>";
                                    echo "<td>" . $rreshti['pjesaFaqes_umsso'] . "</td>";
                                    echo "<td><a class='button primary small' style='background-color: #2c2c2c;' href=\"fshirjaSistemitOperativ.php?idso=$rreshti[id_eDhena_umsso]\" onClick=\"return confirm('Jeni të sigurt që dëshironi ta fshini?')\">Fshij</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                $pyetsori = mysqli_query($lidhja, "SELECT * FROM tedhenat_umsso");

                                while ($rreshti = mysqli_fetch_array($pyetsori)) {
                                    echo "<tr>";
                                    echo "<td>" . $rreshti['titulli_umsso'] . "</td>";
                                    if($rreshti['pjesaFaqes_umsso'] == "kokaFaqes" 
                                    || $rreshti['pjesaFaqes_umsso'] == "menyjaBallines" 
                                    || $rreshti['pjesaFaqes_umsso'] == "menyjaPerFollderatMenaxho"
                                    || $rreshti['pjesaFaqes_umsso'] == "menyjaMenaxhoP"
                                    || $rreshti['pjesaFaqes_umsso'] == "menyjaModulitTePerdoruesit"){
                                        echo "<td></td>";
                                    }else{

                                        echo "<td>" . $rreshti['pershkrimi_umsso'] . "</td>";
                                    }
                                    echo "<td>" . $rreshti['pjesaFaqes_umsso'] . "</td>";
                                    echo "<td><a class='button primary small' style='background-color: #2c2c2c;' href=\"perditesoTeDhenat.php?idd=$rreshti[id_eDhena_umsso]\">Modifiko</a></td>";
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