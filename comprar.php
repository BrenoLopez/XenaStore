<?php 
	session_start();
	include_once "php/conexao.php"; 
	try{	

		$formapagamento = filter_var($_POST['formapagamento']);// Recebe a forma de pagamento para ser inserido
		$_SESSION['carrinho']=intval($_SESSION['carrinho']);//converção para inteiro
  		$idpedido=$_SESSION['carrinho'];

		//Mudo a forma de pagamento e a situação para novo 'N'
		$atualizar= $conectar->prepare("UPDATE pedidos 
                                    	SET formapagamento = :formapagamento, situacao='N' 
                                    	WHERE idpedido = :idpedido");
        $atualizar->bindParam(':formapagamento', $formapagamento);
        $atualizar->bindParam(':idpedido', $idpedido);
        $atualizar->execute();
		
		//Muda variavel de seção para NULL
		$_SESSION['carrinho']=null;
		
		header('location: carrinho.php');
  		  			
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
?>