<?php 
	session_start();
	
	include_once "php/conexao.php"; 
	
	$iditem = filter_var($_GET['iditem']);// Recebe o iditem para ser inserido
	$quantidade = filter_var($_GET['quantidade']);// Recebe a quantidade para ser inserido
	
	$iditem=intval($iditem);//converção para inteiro
	$quantidade=intval($quantidade);//converção para inteiro
	$_SESSION['carrinho']=intval($_SESSION['carrinho']);//converção para inteiro
  	
  	$idpedido=$_SESSION['carrinho'];

	try{	
  		// Aumento a quantidade do Item no estoque
		$atualizar= $conectar->prepare("UPDATE items 
												SET quantidade = quantidade + :quantidade
												WHERE iditem = :iditem");
		$atualizar->bindParam(':iditem', $iditem);
		$atualizar->bindParam(':quantidade', $quantidade);
		$atualizar->execute();

		// Excluo o Item do pedido
  		$delete= $conectar->prepare("DELETE FROM itemspedidos
  										WHERE iditem= :iditem AND idpedido=:idpedido");
		$delete-> bindParam(':iditem',$iditem); 
		$delete-> bindParam(':idpedido',$idpedido); 
		$delete->execute();

		header('location: carrinho.php');
		
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
?>