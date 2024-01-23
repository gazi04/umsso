<?php
include('_konfigurimi.php');
session_start();

$perdoruesi = $_SESSION['emriPerdoruesit'];
$pyetsori = mysqli_query($lidhja,"SELECT perdoruesi_umsso FROM perdoruesit_umsso WHERE perdoruesi_umsso='$perdoruesi'");
$rreshti = mysqli_fetch_array($pyetsori,MYSQLI_ASSOC);
$perdoruesi_kyqur = $rreshti['perdoruesi_umsso'];

if(!isset($perdoruesi)) {
    header("Location: index.php");
}
?>