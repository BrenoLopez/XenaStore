<?php
session_start();

require_once "../requeridos.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$res;

$email="greisonsantos03@gmail.com";
$senha="160597";

$User = new User();
$User = $User->ReadByEmail($email);


if ($User === NULL) {
	$res = 'no_user_found';
	session_destroy();
} else {
	$verificaEmail = strcmp($email,$User['email']);
     
	if ($verificaEmail === 0) {
		$verificaSenha = password_verify($senha,$User['password']);

		var_dump($verificaSenha);
		
		if ($verificaSenha) {
			$_SESSION['id_user'] = $User['id_user'];
			$_SESSION['firt_name'] = $User['firt_name'];
			$_SESSION['tipo'] = $User['tipo'];
			$res = 'true';
		} else {
			$res = 'wrong_password';
			session_destroy();
		}
	} else {
		$res = 'wrong_user_found';
		session_destroy();
	}
}
echo $res;
?>