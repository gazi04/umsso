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
        <?php include("../_menyjaPerFollderatMenaxho.php") ?>

        <div id="main">
            <section id="first" class="main special">
                <header class="major">
                    <h2>Përshëndetje, <?php include("../_verifikimi.php");
                                            echo $perdoruesi_kyqur; ?> zgjidhni përdoruesin që dëshironi të modifikoni</h2>
                </header>

                <section id="content" class="main">
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
                                    <li><input type="submit" name="dorezo" value="Kërko" class="button primary fit" style="background-color: #2c2c2c;" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Përdoresi</th>
                                    <th>Fjalëkalimi</th>
                                    <th>Modifiko</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../_konfigurimi.php");

                                if (!empty($_REQUEST['termi'])) {

                                    $termi = mysqli_real_escape_string($lidhja, $_REQUEST['termi']);
                                    $pyetsori = mysqli_query($lidhja, "SELECT * FROM perdoruesit_umsso WHERE perdoruesi_umsso LIKE '%" . $termi . "%' ");

                                    while ($rreshti = mysqli_fetch_array($pyetsori)) {
                                        echo "<tr>";
                                        echo "<td>" . $rreshti['perdoruesi_umsso'] . "</td>";
                                        echo "<td>" . $rreshti['fjalekalimi_umsso'] . "</td>";
                                        echo "<td><a href=\"perditesoPerdoruesin.php?idp=$rreshti[id_perdoruesi_umsso]\">Modifiko</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    $pyetsori = mysqli_query($lidhja, "SELECT * FROM perdoruesit_umsso");

                                    while ($rreshti = mysqli_fetch_array($pyetsori)) {
                                        echo "<tr>";
                                        echo "<td>" . $rreshti['perdoruesi_umsso'] . "</td>";
                                        echo "<td>" . $rreshti['fjalekalimi_umsso'] . "</td>";
                                        echo "<td><a href=\"perditesoPerdoruesin.php?idp=$rreshti[id_perdoruesi_umsso]\">Modifiko</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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