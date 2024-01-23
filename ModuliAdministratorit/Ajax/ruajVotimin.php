<?php
    session_start();
    require("kontrolluesiDatabazes.php");
	$kontrolluesiDB = new KontrolluesiDatabazes();
	
	$idPergjigjjes  = $_POST['answer'];
	$idPyetjes = $_POST['question'];
	
	$pyetsoriPerShtiminEVotimit = "INSERT INTO votimi_umsso(id_pytja_umsso, id_pergjigjja_umsso, id_perdoruesi_umsso) VALUES ('" . $idPyetjes ."','" . $idPergjigjjes . "','" . $_SESSION["id_pergjigjja_umsso"] . "')";
    $shtoId = $kontrolluesiDB->shtoPyetsorin($pyetsoriPerShtiminEVotimit);
    
    if(!empty($shtoId)) {
        $pyetsoriPerPergjigjet = "SELECT * FROM pergjigjet_umsso WHERE id_pytja_umsso = " . $idPyetjes;
        $pergjigjjet = $kontrolluesiDB->ekzekutoPyetsorin($pyetsoriPerPergjigjet);
    }
    
    if(!empty($pergjigjjet)) {
?>        
        <h3>Rezultati</h3>
<?php
        $pyetsoriPerNumeriminEPergjigjjeve = "SELECT count(id_pergjigjja_umsso) as numerimiTotal FROM votimi_umsso WHERE id_pytja_umsso = " . $idPyetjes;
        $vleresimiTotal = $kontrolluesiDB->ekzekutoPyetsorin($pyetsoriPerNumeriminEPergjigjjeve);
        
        foreach($pergjigjjet as $qelsi=>$vlera) {
            $pyetsor = "SELECT count(id_pergjigjja_umsso) as numerimiPergjigjeve FROM votimi_umsso WHERE id_pytja_umsso = " .$idPyetjes . " AND id_pergjigjja_umsso = " . $pergjigjjet[$qelsi]["id_pergjigjja_umsso"];
            $vleresimiPergjigjes = $kontrolluesiDB->ekzekutoPyetsorin($pyetsor);
            $numriPergjigjeve = 0;
            if(!empty($vleresimiPergjigjes)) {
                $numriPergjigjeve = $vleresimiPergjigjes[0]["numerimiPergjigjeve"];
            }
            $perqindja = 0;
            if(!empty($vleresimiTotal)) {
                $perqindja = ( $numriPergjigjeve / $vleresimiTotal[0]["numerimiTotal"] ) * 100;
                if(is_float($perqindja)) {
                    $perqindja = number_format($perqindja,2);
                }
            }
            
?>
        <div style="text-align: center;">
		<div><?php echo $pergjigjjet[$qelsi]["pergjigje_umsso"]; ?>: <span style="font-weight: bold;"> <?php echo $perqindja . "%"; ?></span></div>      
        </div>
<?php 
        }
    }
?>
    <button class="button" style="background-color: #2c2c2c; font-size: 15px;" onClick="tregoVotimin()"><span style="color: #ffffff;">VAZHDO</span></button>