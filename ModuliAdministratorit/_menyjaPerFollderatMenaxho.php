<?php
// kjo meny perdoret vetem tek follderat menaxhoS, menaxhoSO, menaxhoTD
include("_konfigurimi.php");
$pyetsori = "SELECT * FROM tedhenat_umsso WHERE pjesaFaqes_umsso='menyjaPerFollderatMenaxho'";
$rezultati = mysqli_query($lidhja, $pyetsori);

while($rreshti = mysqli_fetch_assoc($rezultati)){
    extract($rreshti);
}

echo $pershkrimi_umsso;
?>