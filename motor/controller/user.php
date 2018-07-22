<?php

	require_once "../requeridos.php";
	
	//parte1
	
	$id_user = $_POST['id_user'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$cep = $_POST['cep'];
	$tipo = $_POST['tipo'];
	
	

	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new User();
	$Item->SetValues($id_user, $first_name, $last_name, $email, $password, $cpf, $endereco, $telefone, $cep, $tipo); 
	
	
		
	//parte4
	switch($action) {
		case 'create':
			
			
			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			
			// echo $res;
			//retornando para pagina apos cadastrar
			header("location: ../../admin/views/user/func.php");
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>
