<?php
session_start();

require_once "../requeridos.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$res;

$User = new User();
$User = $User->ReadByEmail($email);



if ($User === NULL) {
	$res['res']= 'no_user_found';
	session_destroy();
} else {
	$verificaEmail = strcmp($email,$User['email']);

	if ($verificaEmail == 0) {
		$verificaSenha = password_verify($senha,$User['password']);

		if ($verificaSenha) {
			$_SESSION['id_user'] = $User['id_user'];
			$_SESSION['firt_name'] = $User['first_name'];
			$_SESSION['tipo'] = $User['tipo'];
			

			if ($User['tipo']==1){
				$res['tipo']='admin';
			}else {
				$res['tipo']='cli';
			}
			$res['res'] = 'true';

		} else {
			$res['res']= 'wrong_password';
			session_destroy();
		}
	} else {
		$res['res']= 'wrong_user_found';
		session_destroy();
	}
}
echo json_encode($res);
?>