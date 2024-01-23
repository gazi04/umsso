<?php
include('../_konfigurimi.php');
session_start();
$verifikoPerdoruesin=$_SESSION['emriPerdoruesit'];
$rezultati = mysqli_query($lidhja,"SELECT * FROM perdoruesit_umsso WHERE perdoruesi_umsso='$verifikoPerdoruesin' ");
$rreshti=mysqli_fetch_array($rezultati,MYSQLI_ASSOC);
if(!isset($verifikoPerdoruesin))
{ header("Location: index.php");} 

    $_SESSION["id_pergjigjja_umsso"] =  $rreshti['id_perdoruesi_umsso'];
    
	require("kontrolluesiDatabazes.php");
	$kontrolluesiDB = new KontrolluesiDatabazes();
	
	$pyetsori = "SELECT DISTINCT id_pytja_umsso from votimi_umsso WHERE id_perdoruesi_umsso = " . $_SESSION["id_pergjigjja_umsso"]; 
	$rezultati = $kontrolluesiDB->merrId($pyetsori);
	
	$kushti = "";
	if(!empty($rezultati)) {
	    $kushti = " WHERE id_pytja_umsso NOT IN (" . implode(",", $rezultati) . ")";
    }
    
    $pyetsoriPerPyetjetEVotim = "SELECT * FROM `pytjet_umsso` " . $kushti . " limit 1";
    $pyetjetEVotimit = $kontrolluesiDB->ekzekutoPyetsorin($pyetsoriPerPyetjetEVotim);
    
    if(!empty($pyetjetEVotimit)) {
?>      
		<input type="hidden" name="question" id="question" value="<?php echo $pyetjetEVotimit[0]["id_pytja_umsso"]; ?>" >   
		<div style="text-align: left; padding-left: 30%;"><h3><?php echo $pyetjetEVotimit[0]["pytja_umsso"] ?></h3></div>
		<div style="text-align: left; padding-left: 30%;">
<?php 
        $pyetsorePerPergjigjet = "SELECT * FROM pergjigjet_umsso WHERE id_pytja_umsso = " . $pyetjetEVotimit[0]["id_pytja_umsso"];
        $pergjigjjet = $kontrolluesiDB->ekzekutoPyetsorin($pyetsorePerPergjigjet);
        if(!empty($pergjigjjet)) {
            foreach($pergjigjjet as $k=>$v) {
				$idUnike = "demo-priority-" . $pergjigjjet[$k]["id_pergjigjja_umsso"];
?>
				<input type="radio" id="<?php echo $idUnike; ?>" name="answer" value="<?php echo $pergjigjjet[$k]["id_pergjigjja_umsso"]; ?>">
				<label for="<?php echo $idUnike; ?>"><?php echo $pergjigjjet[$k]["pergjigje_umsso"]; ?></label>
				<br>      
<?php 
            }
        }
?>		
		</div>
		<ul class="actions">
			<button class="button" style="background-color: #2c2c2c; font-size: 15px; margin-left: 35%;" onClick="shtoVotimin()"><span style="color: #ffffff;">DËRGO</span></button>
		</ul>
<?php        
    } else {
?>

<div>
	Votimi perfundoi me sukses!<br><br>
	<a style="background-color:#2c2c2c; font-size:15px;" href="../ballina.php" class="button"><span style="color: #ffffff;">KTHEHU</span></a>
</div>
<?php 
    }
?>