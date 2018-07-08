<?php 
	session_start();
	include_once "php/conexao.php"; 
	try{	
		$iditem = filter_var($_GET['iditem']);// Recebe o iditem para ser inserido
		$iditem=intval($iditem);//converção para inteiro
		$quantidade='1';// Quantidade do item a ser inserido

		// Caso usuário não esteja logado, o redireciona para o login/cadastro clientes 
  		if(!isset($_SESSION['idusuario'])){
  			header('location: login.php');
  		}

  		// Caso carrinho ainda não criada, cria e adiciona o Item 
  		else if ($_SESSION['carrinho'] == NULL){
  			$situacao='P';//auxiliar para marcar a situação do pedido em processamento - 'P'
  			$_SESSION['idusuario']=intval($_SESSION['idusuario']);//converção para inteiro
  			
  			// Pesquisa idcliente a partir do idusuario
  			$idusuario=$_SESSION['idusuario'];
  			$consulta = $conectar->query("SELECT idcliente
                                            FROM usuarios 
                                            WHERE idusuario = '$idusuario' ");
            $linha = $consulta->fetch(PDO::FETCH_ASSOC);
			$idcliente=$linha['idcliente'];
			
			// Insere Pedido
			$date=date('Y-m-d');
		    $insert = $conectar->prepare("INSERT INTO pedidos (idcliente,situacao,datapedido) VALUES (:idcliente,:situacao,:datapedido)");
			$insert->bindParam(':idcliente',$idcliente);
			$insert->bindParam(':situacao', $situacao);
			$insert->bindParam(':datapedido', $date);
			$insert->execute();
			
			// Pega idpedido Atual (Ultimo inserido pelo cliente em questão)
			$consulta = $conectar->query("SELECT idpedido
                                            FROM pedidos p 
                                            WHERE idcliente = '$idcliente'
                                            ORDER BY idpedido DESC LIMIT 1");
			$linha=$consulta->fetch(PDO::FETCH_ASSOC);
			$_SESSION['carrinho'] = $linha[idpedido];
			
			// Consulto preço de venda do Item para adicionar em itens pedidos
			$consulta = $conectar->query("SELECT precovenda
                                            FROM items
                                            WHERE iditem = '$iditem'");
			$linha=$consulta->fetch(PDO::FETCH_ASSOC);
			$precovenda = $linha['precovenda'];

			// Insere Item a tabela Items Pedidos
			$insert = $conectar->prepare("INSERT INTO itemspedidos (idpedido,iditem,quantidade,precovenda) VALUES (:idpedido,:iditem,:quantidade,:precovenda) ");
			$insert->bindParam(':idpedido',$_SESSION['carrinho']);
			$insert->bindParam(':iditem',$iditem);
			$insert->bindParam(':quantidade', $quantidade);
			$insert->bindParam(':precovenda',$precovenda);
			$insert->execute();

			// Diminuo a quantidade inserida do Item do estoque
			$atualizar= $conectar->prepare("UPDATE items 
									SET quantidade = quantidade - :quantidade 
									WHERE iditem = :iditem");
			$atualizar->bindParam(':quantidade', $quantidade);
			$atualizar->bindParam(':iditem', $iditem);
			$atualizar->execute();
			header('location: produtos.php');
  		}

  		// Caso já tenha sido criado, so adiciona o Item ao carrinho
  		else{
  			//Verifico se Item já não está inserido
  			$idpedido=$_SESSION['carrinho'];
  			$consulta = $conectar->query("SELECT *
                                            FROM itemspedidos
                                            WHERE idpedido = '$idpedido' AND iditem = '$iditem' ");
  			$rowCount = count($consulta->fetch());
			if ($rowCount > 1) {
				// Se já inserido aumento a quantidade do Item em Itenspedidos
				$atualizar= $conectar->prepare("UPDATE itemspedidos 
										SET quantidade = quantidade + :quantidade 
										WHERE iditem = :iditem");
				$atualizar->bindParam(':quantidade', $quantidade);
				$atualizar->bindParam(':iditem', $iditem);
				$atualizar->execute();
				// Diminuo a quantidade inserida do Item do estoque
				$atualizar= $conectar->prepare("UPDATE items 
										SET quantidade = quantidade - :quantidade 
										WHERE iditem = :iditem");
				$atualizar->bindParam(':quantidade', $quantidade);
				$atualizar->bindParam(':iditem', $iditem);
				$atualizar->execute();
				header('location: produtos.php');
			} 
			else{//Caso Item não esteja inserido ainda em Itemspedidos
				
				// Consulto preço de venda do Item para adicionar em itens pedidos
				$consulta = $conectar->query("SELECT precovenda
	                                            FROM items
	                                            WHERE iditem = '$iditem'");
				$linha=$consulta->fetch(PDO::FETCH_ASSOC);
				$precovenda = $linha['precovenda'];

	  			// Insere Item a tabela Items Pedidos
				$insert = $conectar->prepare("INSERT INTO itemspedidos (idpedido,iditem,quantidade,precovenda) VALUES (:idpedido,:iditem,:quantidade,:precovenda) ");
				$insert->bindParam(':idpedido',$_SESSION['carrinho']);
				$insert->bindParam(':iditem',$iditem);
				$insert->bindParam(':quantidade', $quantidade);
				$insert->bindParam(':precovenda',$precovenda);
				$insert->execute();
				$quantidade='1';//Retorno valor 1 para quantiade, para subtrair certo da quantidade
				// Diminuo a quantidade inserida do Item do estoque
				$atualizar= $conectar->prepare("UPDATE items 
										SET quantidade = quantidade - :quantidade 
										WHERE iditem = :iditem");
				$atualizar->bindParam(':quantidade', $quantidade);
				$atualizar->bindParam(':iditem', $iditem);
				$atualizar->execute();
				header('location: produtos.php');
			}
  		}  			
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
?>