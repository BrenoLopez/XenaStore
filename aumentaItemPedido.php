<?php 
	session_start();
	include_once "php/conexao.php"; 
	
	$iditem = filter_var($_GET['iditem']);// Recebe o iditem para ser inserido
	$iditem=intval($iditem);//converção para inteiro
	
	$_SESSION['carrinho']=intval($_SESSION['carrinho']);//converção para inteiro
  	$idpedido=$_SESSION['carrinho'];
	
	try{
		// Consulto a Disponibilidade de Aumentar a Quantidade do Produto
		$consulta = $conectar->query("SELECT quantidade
                                            FROM items 
                                            WHERE iditem = '$iditem' ");
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
		$quantidade=$linha['quantidade'];

		if($quantidade < 1){//Caso Quantidade seja menor que 1, não temos mais em estoque	
			header('location: carrinho.php');
  		}
  		else{//Caso Quantidade do item seja igual ou maior que 1

  			// Aumento a quantidade do item em Items Pedidos
  			$atualizar= $conectar->prepare("UPDATE itemspedidos 
			 									SET quantidade = quantidade + 1
												WHERE iditem=:iditem AND idpedido=:idpedido");
			$atualizar->bindParam(':idpedido', $idpedido);
			$atualizar->bindParam(':iditem', $iditem);
			$atualizar->execute();
  			
  			// Diminuo a quantidade inserida do Item no estoque
			$atualizar= $conectar->prepare("UPDATE items 
												SET quantidade = quantidade - 1 
												WHERE iditem = :iditem");
			$atualizar->bindParam(':iditem', $iditem);
			$atualizar->execute();

  			header('location: carrinho.php');

  		}	
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
?>