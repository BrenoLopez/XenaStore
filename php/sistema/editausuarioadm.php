<?php
	include_once "../conexao.php";

	$login = filter_var($_POST['login']);
	$senha = filter_var($_POST['senha']);
	$idadministrador = filter_var($_POST['idadministrador']);

	$atualizar= $conectar->prepare("UPDATE administrador 
									SET login=:login, senha=:senha 
									WHERE idadministrador =:idadministrador");
	$atualizar->bindParam(':login', $login);
	$atualizar->bindParam(':senha', $senha);
	$atualizar->bindParam(':idadministrador', $idadministrador);
	$atualizar->execute();

	$atualizar->execute();

	header('location: ../../sistema/usuarios/usuarios.php'); //Me redireciona novamente para o index.php depois da inserção
?>