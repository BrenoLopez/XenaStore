<?php
	session_start();
	include_once "php/conexao.php";
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	try{
		$consulta = $conectar->query("SELECT * 
									  FROM administrador 
									  WHERE login='$login' and senha='$senha'");
		$linha=$consulta->fetch(PDO::FETCH_ASSOC);
		if($linha[login] == $login && $linha[senha] == $senha){
			$_SESSION['idadministrador']=$linha[idadministrador];
			$_SESSION['login']=$linha[login];
			header('location: sistema/administracao.php');	
		}
		else
			header('location: loginadministracao.php');
	}catch(PDOException $e){
        echo $e->getMessage();
    }
?>