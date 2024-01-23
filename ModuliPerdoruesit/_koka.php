<?php
include("_konfigurimi.php");
$pyetsori = "SELECT * FROM tedhenat_umsso WHERE pjesaFaqes_umsso='kokaFaqes'";
$rezultati = mysqli_query($lidhja, $pyetsori);

while($rreshti = mysqli_fetch_assoc($rezultati)){
    extract($rreshti);
}

echo $pershkrimi_umsso;
?>