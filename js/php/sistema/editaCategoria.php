<?php
	include_once "../conexao.php";

	$idcategoria = filter_var($_POST['idcategoria']);
	$nomecategoria = filter_var($_POST['nomecategoria']);
	$descricao = filter_var($_POST['descricao']);
	
	$atualizar= $conectar->prepare("UPDATE categoria 
									SET nomecategoria=:nomecategoria, descricao=:descricao 
									WHERE idcategoria =:idcategoria");
	$atualizar->bindParam(':nomecategoria', $nomecategoria);
	$atualizar->bindParam(':descricao', $descricao);
	$atualizar->bindParam(':idcategoria', $idcategoria);
	$atualizar->execute();

	header('location: ../../sistema/produtos/categorias.php');
?>