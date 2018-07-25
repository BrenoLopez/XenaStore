<?php

	require_once "../requeridos.php";
	

	//parte1
	$id_pedido = $_REQUEST['id_pedido'];
	$id_user = $_POST['id_user'];
	$id_produto = $_POST['id_produto'];
	$situacao = $_POST['situacao'];
	$data_pedido = $_POST['data_pedido'];
	$quantidade = $_POST['quantidade'];
	$valor_total = $_POST['valor_total'];
	$tamanho = $_POST['tamanho'];
	$forma_pagamento = $_POST['forma_pagamento'];
	
	
	//parte2

    
	$action = $_REQUEST['action'];
	
	//parte3
	$Item = new Pedido();
	$Item->SetValues($id_pedido, $id_user, $id_produto, $situacao, $data_pedido, $quantidade, $valor_total, $tamanho, $forma_pagamento); 
	
	
		
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

			echo $res;
			
		
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
			// echo $res;
			header("location: ../../cliente/views/carrinho.php");

		
		break;	
		
		
		
	}
?>
