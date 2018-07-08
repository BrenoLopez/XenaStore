<?php
include_once "../conexao.php";

try{	
	$login = filter_var($_POST['login']);
	$senha = filter_var($_POST['senha']);
	
	$insert = $conectar->prepare("INSERT INTO administrador (login,senha) VALUES (:login,:senha)");
	
	$insert->bindParam(':login', $login);
	$insert->bindParam(':senha', $senha);
	$insert->execute();

}catch(PDOException $e){//Trata a exceção se ocorrer
	echo $e->getMessage();
}
header('location: ../../sistema/usuarios/usuarios.php'); //Me redireciona novamente para o index.php depois da inserção
?>