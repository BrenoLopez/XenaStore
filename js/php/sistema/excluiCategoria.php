<?php
	include_once "../conexao.php";

	try{
		$idcategoria = filter_var($_GET['idcategoria'],FILTER_SANITIZE_NUMBER_INT);
		$delete= $conectar->prepare("DELETE FROM categoria where idcategoria= :idcategoria");
		$delete-> bindParam(':idcategoria',$idcategoria); 
		$delete->execute();
	}
	catch(PDOExeption $e){
		echo "Erro: ".$e->getMessage();
	}
	header("location:../../sistema/produtos/categorias.php");
?>