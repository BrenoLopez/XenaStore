<?php
	include_once "../conexao.php";


		//Pega todos os parâmetros passados para Item
		$idcategoria = filter_var($_POST['idcategoria'],FILTER_VALIDATE_INT);
		$nomeproduto = filter_var($_POST['nomeproduto']);
		$precocomprainicial = filter_var($_POST['precocompra']);
		$precovendainicial = filter_var($_POST['precovenda']);
		$descricao = filter_var($_POST['descricao']);
		//Pega todos os parâmetros passados para Imagem
		$nome  = $_FILES['imagem']['name'];
		$titulo  = $nomeproduto;
        $arquivo = $_FILES['imagem']['tmp_name'];

        //Converte as variaveis do Item para float
		$precocompra = floatval($precocomprainicial);
		$precovenda = floatval($precovendainicial);

		//Inserção das informações do Item
		$insert = $conectar->prepare("INSERT INTO items (idcategoria,nomeproduto,precocompra,precovenda,descricao) VALUES (:idcategoria,:nomeproduto,:precocompra,:precovenda,:descricao)");
		$insert->bindParam(':idcategoria', $idcategoria);
		$insert->bindParam(':nomeproduto', $nomeproduto);
		$insert->bindParam(':precocompra', $precocompra);
		$insert->bindParam(':precovenda', $precovenda);
		$insert->bindParam(':descricao', $descricao);
		$insert->execute();

		//Consulta para buscar código do Item inserido para inserir a Imagem
        $consulta = $conectar->query("SELECT * FROM items WHERE nomeproduto like '%$nomeproduto%' "); 
        $linha=$consulta->fetch(PDO::FETCH_ASSOC);
		$iditem = $linha['iditem'];
		
		//Inserção da Imagem
        $caminho_imagem = "img/".$nome;
        // Faz o upload da imagem para seu respectivo caminho
       move_uploaded_file($arquivo["imagem"]["tmp_imagem"], $caminho_imagem);
		if(	$insertImagem = $conectar->prepare("INSERT INTO imagem (nome,titulo,iditem) 
												VALUES (:nome,:titulo,:iditem)")){
			$insertImagem->bindParam(':nome', $nome);
			$insertImagem->bindParam(':titulo', $titulo);
			$insertImagem->bindParam(':iditem', $iditem);
			$insertImagem->execute();}

		else
			echo "Não foi possível carregar o arquivo para o servidor.";
		header('location: ../../sistema/produtos/produtos.php');

?>