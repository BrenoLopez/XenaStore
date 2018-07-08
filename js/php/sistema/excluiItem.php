<?php
	include_once "../conexao.php";

	try{
		$iditem = filter_var($_GET['iditem'],FILTER_SANITIZE_NUMBER_INT);
		$delete= $conectar->prepare("DELETE FROM items where iditem= :iditem");
		$delete-> bindParam(':iditem',$iditem); 
		$delete->execute();
	}
	catch(PDOExeption $e){
		echo "Erro: ".$e->getMessage();
	}
	header("location:../../sistema/produtos/produtos.php");
?>