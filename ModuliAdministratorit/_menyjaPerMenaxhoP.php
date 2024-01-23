<?php
// kjo do te therret menyn e perdoruesit nga databaza te cilen do ta thirrim tek follderi menaxhoP
include("_konfigurimi.php");

$pyetsori = "SELECT * FROM tedhenat_umsso WHERE pjesaFaqes_umsso='menyjaMenaxhoP'";
$rezultati = mysqli_query($lidhja, $pyetsori);

while($rreshti = mysqli_fetch_assoc($rezultati)){
    extract($rreshti);
}

echo $pershkrimi_umsso;
?>