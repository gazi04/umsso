<?php
class KontrolluesiDatabazes {
	private $Hosti = "localhost";
	private $Perdoruesi = "root";
	private $Fjalekalimi = "";
	private $Databaza = "umsso";
	private $Lidhja;
	
	function __construct() {
		$this->Lidhja = $this->LidhDatabazen();
	}
	
	function LidhDatabazen() {
		$lidhja = mysqli_connect($this->Hosti,$this->Perdoruesi,$this->Fjalekalimi,$this->Databaza);
		return $lidhja;
	}
	
	function ekzekutoPyetsorin($pyetsori) {
		$rezultati = mysqli_query($this->Lidhja, $pyetsori);
		while($rreshti=mysqli_fetch_array($rezultati)) {
			$grupiRezultateve[] = $rreshti;
		}
		if(!empty($grupiRezultateve))
			return $grupiRezultateve;
	}
	
	function shtoPyetsorin($pyetsori) {
	    mysqli_query($this->Lidhja, $pyetsori);
	    $shtoId = mysqli_insert_id($this->Lidhja);
	    return $shtoId;
	}
	
	function merrId($pyetsori) {
	    $rezultati = mysqli_query($this->Lidhja,$pyetsori);
	    while($rreshti=mysqli_fetch_array($rezultati)) {
	        $grupiRezultateve[] = $rreshti[0];
	    }
	    if(!empty($grupiRezultateve))
	        return $grupiRezultateve;
	}
}
?>