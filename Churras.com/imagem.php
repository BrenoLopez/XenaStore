<?php
    // Incluindo arquivo de conexão
    include_once "php/conexao.php";
     
    $iditem = filter_var($_GET['iditem']);
    $iditem='12';

    // Selecionando fotos
    $consulta = $conectar->query("SELECT * FROM imagem WHERE iditem ='$iditem' ");
    $linha=$consulta->fetch(PDO::FETCH_ASSOC);
    
    $conteudo = $linha['conteudo'];
    $tipo = $linha['tipo'];
    //var_dump($conteudo);

    //echo '<img src="data:image/jpeg;base64,'.base64_encode($conteudo).'"/>';
      // Definindo tipo do retorno
    
    header('Content-Type: '. $tipo);
            
    // Retornando conteudo
    echo $conteudo;
    var_dump($conteudo);
?>