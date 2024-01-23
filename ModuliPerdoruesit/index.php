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
</head>
<body class="is-preload">
    <div id="wrapper">
        <?php include("_koka.php"); ?>
        <?php include("_menyja.php"); ?>

        <div id="main">
            <section id="content" class="main">
            <?php
                include("_konfigurimi.php");
                
                $pyetsoriPerKategori = "SELECT * FROM sistemetoperative_umsso ORDER BY id_sistemiOperativ_umsso DESC LIMIT 2";
                $kategorit = mysqli_query($lidhja, $pyetsoriPerKategori);
                while($kategoria = mysqli_fetch_array($kategorit)){
                    $pyetsori = "SELECT so.sistemiOperativ_umsso, s.softueri_umsso, s.gjuhetProgramuese_umsso, s.fotoja_umsso, s.emriFotos_umsso FROM softueret_umsso s 
                    LEFT OUTER JOIN sistemetoperative_umsso so ON s.id_sistemiOperativ_umsso = so.id_sistemiOperativ_umsso 
                    WHERE so.sistemiOperativ_umsso = '".$kategoria['sistemiOperativ_umsso']."'
                    GROUP BY so.sistemiOperativ_umsso, s.softueri_umsso, s.gjuhetProgramuese_umsso, s.fotoja_umsso, s.emriFotos_umsso 
                    ORDER BY so.id_sistemiOperativ_umsso, s.id_softueri_umsso DESC LIMIT 3;";
                    $rezultati = mysqli_query($lidhja, $pyetsori);

                    echo "<h2>". $kategoria["sistemiOperativ_umsso"] ."</h2>";
                    echo "<hr>";
                    echo "<ul class='features'>";
                    while($rreshti = mysqli_fetch_array($rezultati)){
                        extract($rreshti);                        
                        if($kategoria["sistemiOperativ_umsso"] == $sistemiOperativ_umsso){?>
                            <li>
                                <span class="image fit" style="width: 30%;"><?php echo '<img src="data:foto/jpeg;base64,'.base64_encode( $fotoja_umsso ).'">'; ?></span>

                                <h3><?php echo $softueri_umsso ?></h3>
                                <p>Programuar në: <?php echo $gjuhetProgramuese_umsso?>.</p>
                            </li>
                            <?php
                        }
                    }
                    echo "</ul>";
                }
            ?>
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