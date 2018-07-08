<?php
	include_once "../conexao.php";

	$idadministrador = filter_var($_POST['idadministrador']);
	$login = filter_var($_POST['login']);
	$senha = filter_var($_POST['senha']);
	
	$atualizar= $conectar->prepare("UPDATE administrador 
									SET login=:login, senha=:senha 
									WHERE idadministrador =:idadministrador");
	$atualizar->bindParam(':login', $login);
	$atualizar->bindParam(':senha', $senha);
	$atualizar->bindParam(':idadministrador', $idadministrador);
	$atualizar->execute();

	header('location: ../../sistema/profile/profile.php');
?>