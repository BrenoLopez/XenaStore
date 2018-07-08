<?php
	include_once "../conexao.php";

	try{	
		$idcategoria = filter_var($_POST['idcategoria']);
		$nomecategoria = filter_var($_POST['nomecategoria']);
		$descricao = filter_var($_POST['descricao']);
		
		$insert = $conectar->prepare("INSERT INTO categoria (idcategoria,nomecategoria,descricao) 
										VALUES (:idcategoria,:nomecategoria,:descricao)");
		$insert->bindParam(':idcategoria', $idcategoria);
		$insert->bindParam(':nomecategoria', $nomecategoria);
		$insert->bindParam(':descricao', $descricao);
		$insert->execute();

	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
	header('location: ../../sistema/produtos/categorias.php');
?>