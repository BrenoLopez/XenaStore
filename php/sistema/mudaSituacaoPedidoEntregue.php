<?php
	include_once "../conexao.php";

	$idpedido = filter_var($_GET['idpedido']);
	$idpedido = intval($idpedido);
	$situacao='E';
	$atualizar= $conectar->prepare("UPDATE pedidos 
									SET situacao=:situacao
									WHERE idpedido =:idpedido");
	$atualizar->bindParam(':situacao', $situacao);
	$atualizar->bindParam(':idpedido', $idpedido);
	$atualizar->execute();

	header('location: ../../sistema/pedidos/pedidosnovos.php');
?>