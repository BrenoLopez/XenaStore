<?php

	include_once ("../conexao.php");



	//Pega todos os parâmetros passados para Item

	$iditem = filter_var($_POST['iditem'],FILTER_VALIDATE_INT);

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



	//SQL Edição do Item

	$atualizar= $conectar->prepare("UPDATE items 

									SET idcategoria=:idcategoria, precocompra=:precocompra, precovenda=:precovenda, nomeproduto=:nomeproduto,descricao=:descricao

									WHERE iditem =:iditem");

	$atualizar->bindParam(':iditem', $iditem);

	$atualizar->bindParam(':idcategoria', $idcategoria);

	$atualizar->bindParam(':nomeproduto', $nomeproduto);

	$atualizar->bindParam(':precocompra', $precocompra);

	$atualizar->bindParam(':precovenda', $precovenda);

	$atualizar->bindParam(':descricao', $descricao);

	$atualizar->execute();





    $caminho_imagem = '../../img/'.$nome;

    // Faz o upload da imagem para seu respectivo caminho

    move_uploaded_file($arquivo,$caminho_imagem);



if($atualizarImagem= $conectar->prepare("UPDATE imagem SET nome=:nome,titulo=:titulo WHERE iditem =:iditem")){

		$atualizarImagem->bindParam(':nome', $nome);

		$atualizarImagem->bindParam(':titulo', $titulo);

		$atualizarImagem->bindParam(':iditem', $iditem);

		$atualizarImagem->execute();



	}

	else

	{

		echo "Não foi possível carregar o arquivo para o servidor.";

    }

	header('location: ../../sistema/produtos/produtos.php');

?>

