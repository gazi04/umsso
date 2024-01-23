<?php
include("_konfigurimi.php");

$pyetsori = "SELECT eDhenaAdmin_umsso FROM tedhenatadmin_umsso";
$rezultati = mysqli_query($lidhja, $pyetsori);
$eDhena = array();
while($rreshti = mysqli_fetch_assoc($rezultati)){
  $eDhena[]=$rreshti;
}

$fajlli = fopen('teDhenatPerKouten.json', 'w');
fwrite($fajlli, json_encode($eDhena, JSON_PRETTY_PRINT));
fclose($fajlli);
?>