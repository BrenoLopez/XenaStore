<?php 
	session_start();
	
	include_once "php/conexao.php"; 
	
	$iditem = filter_var($_GET['iditem']);// Recebe o iditem para ser inserido
	
	$quantidade = filter_var($_GET['quantidade']);// Recebe a quantidade para ser inserido
	
	$iditem=intval($iditem);//converção para inteiro
	$quantidade=intval($quantidade);//converção para inteiro
	$_SESSION['carrinho']=intval($_SESSION['carrinho']);//converção para inteiro
  	$idpedido=$_SESSION['carrinho'];
	//var_dump($_GET['iditem']);

	try{	
		// Diminuo a quantidade do Item, mas se apenas ele for maior que 1, pq não pode zerar, para isso ele precisa excluir, em vez de diminuir
		if($quantidade <= 1){	
			header('location: carrinho.php');
  		}
  		else{
  			// Diminui a quantidade do item em Items Pedidos
  			$atualizar= $conectar->prepare("UPDATE itemspedidos 
			 									SET quantidade = quantidade - 1
												WHERE iditem=:iditem AND idpedido=:idpedido");
			$atualizar->bindParam(':idpedido', $idpedido);
			$atualizar->bindParam(':iditem', $iditem);
			$atualizar->execute();
  			
  			// Aumento a quantidade inserida do Item no estoque
			$atualizar= $conectar->prepare("UPDATE items 
												SET quantidade = quantidade + 1 
												WHERE iditem = :iditem");
			$atualizar->bindParam(':iditem', $iditem);
			$atualizar->execute();

  			header('location: carrinho.php');

  		}	
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
?>