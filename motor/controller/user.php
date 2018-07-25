<?php

	require_once "../requeridos.php";
	
	//parte1
	
	$id_user = $_REQUEST['id_user'];
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$telefone = $_REQUEST['telefone'];
	$email = $_REQUEST['email'];
	$cpf = $_REQUEST['cpf'];
	$password = $_REQUEST['password'];
	$estado= $_REQUEST['estado'];
    $cidade=$_REQUEST['cidade'];
	$endereco = $_REQUEST['rua'];
	$cep = $_REQUEST['cep'];
	$tipo = $_REQUEST['tipo'];
    $bairro = $_REQUEST['bairro'];
    $numero = $_REQUEST['numero'];
	

	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new User();
	$Item->SetValues($id_user, $first_name, $last_name, $telefone, $email, $cpf, password_hash($password, PASSWORD_DEFAULT), $estado, $cidade, $endereco, $cep, $tipo, $bairro, $numero); 
	
	
		

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
			header("location: ../../auth/login.php");
		break;

		case 'create_func':
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
			// echo $res;
		header("location: ../../admin/views/user/func.php");
		
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
