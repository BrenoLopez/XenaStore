<?php
include_once "../conexao.php";

try{
	$idadministrador = filter_var($_GET['idadministrador'],FILTER_SANITIZE_NUMBER_INT);
	$delete= $conectar->prepare("DELETE FROM administrador where idadministrador= :idadministrador");
	$delete-> bindParam(':idadministrador',$idadministrador); 
	$delete->execute();
}
catch(PDOExeption $e){
	echo "Erro: ".$e->getMessage();
}
header("location:../../sistema/usuarios/usuarios.php");
?>