<?php
	include_once "../conexao.php";

	$idpedido = $_GET['idpedido'];
	$situacao='C';
	try{
	$atualizar= $conectar->prepare("UPDATE pedidos 
									SET situacao=:situacao
									WHERE idpedido =:idpedido");
	$atualizar->bindParam(':situacao', $situacao);
	$atualizar->bindParam(':idpedido', $idpedido);
	$atualizar->execute();
	
	$atualizar2= $conectar->prepare("UPDATE items 
									SET quantidade = quantidade + (SELECT quantidade
																	FROM itemspedidos ip JOIN items i ON ip.iditem=i.iditem 
																	WHERE idpedido=:idpedido)
									FROM items
									WHERE idpedido =:idpedido");

    $atualizar->bindParam(':idpedido', $idpedido);
	$atualizar2->execute();
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
	//header('location: ../../sistema/pedidos/pedidosnovos.php');
?>