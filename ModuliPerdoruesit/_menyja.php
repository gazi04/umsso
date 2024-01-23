<?php
// kjo do te thrret menyn e ballines nga databaza, dhe ky php fajll do te thirret nga index.php
include("_konfigurimi.php");
$pyetsori = "SELECT * FROM tedhenat_umsso WHERE pjesaFaqes_umsso='menyjaModulitTePerdoruesit'";
$rezultati = mysqli_query($lidhja, $pyetsori);

while($rreshti = mysqli_fetch_assoc($rezultati)){
    extract($rreshti);
}

echo $pershkrimi_umsso;
?>