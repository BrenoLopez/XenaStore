<?php
	session_start();
	if($_SESSION["idadministrador"]){
		session_destroy();
		header("location: ../loginadministracao.php");
		exit;
	}
?>