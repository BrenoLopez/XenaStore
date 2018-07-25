<?php

	require_once "../requeridos.php";
	

	//parte1
	
	$id_product = $_REQUEST['id_product'];
	$name_product =$_REQUEST['name_product'];
	$valor = $_REQUEST['valor'];
	$category = $_REQUEST['category'];
	$quantidade = $_REQUEST['quantidade'];
	$descricao = $_REQUEST['descricao'];
	$tema = $_REQUEST['tema'];

	// $imagem = $_FILES['imagem_produto'];
  
   if ($_REQUEST['imagem']){
    
       $imagem= $_REQUEST['imagem'];
   } else{


 if(isset($_FILES["imagem"])){
     $arquivo = $_FILES["imagem"];
     $pasta_dir = "../../img/";//diretorio dos arquivos

    if(!file_exists($pasta_dir)){
      mkdir($pasta_dir);
    }
   
    $arquivo_nome = $pasta_dir . $arquivo["name"];

   // Faz o upload da imagem
   move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
 } 
  //pegando o caminho para salvar no banco
   $imagem=  $arquivo_nome;
  
}
	//parte2
	$action = $_REQUEST['action'];
	
	//parte3
	$Item = new Produto();
	$Item->SetValues($id_product, $name_product, $valor, $category, $quantidade, $descricao, $imagem, $tema);
	
	
		
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
			header("location: ../../admin/views/estoque/home_estoque.php");
		
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
		   header("location: ../../admin/views/estoque/listar_produtos.php");
		break;	
		
		case 'delete':
			
			
			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			//echo $res;

			header("location: ../../admin/views/estoque/listar_produtos.php");
		
		break;
		
	}
?>
