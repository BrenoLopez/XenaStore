<?php 
	session_start();
	include_once "php/conexao.php"; 
	
	$endereco = filter_var($_POST['enderecoNovo']);// Recebe o novo Endereço
	
	$_SESSION['idusuario']=intval($_SESSION['idusuario']);//converção para inteiro
  	$idpedido=$_SESSION['idusuario'];
	
	try{
		// Pesquisa idcliente a partir do idusuario
  		$idusuario=$_SESSION['idusuario'];
  		$consulta = $conectar->query("SELECT idcliente
                                        FROM usuarios 
                                        WHERE idusuario = '$idusuario' ");
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
		$idcliente=$linha[idcliente];
		// Mudo Endereço do Cliente
  		$atualizar= $conectar->prepare("UPDATE clientes 
			 									SET endereco = :endereco
												WHERE idcliente=:idcliente");
		$atualizar->bindParam(':idcliente', $idcliente);
		$atualizar->bindParam(':endereco', $endereco);
		$atualizar->execute();
		
		header('location: finalizaCompra.php');
	}catch(PDOException $e){//Trata a exceção se ocorrer
		echo $e->getMessage();
	}
?>