<?php
try{
	//Faz conexão com o banco de dados na maquina de valdeci
	//$conectar= new PDO("mysql:host=localhost;port=3306;dbname=churrasdatabase","root","sublime");
    // faz conexao com o banco na maquina de Breno
    $conectar= new PDO("mysql:host=localhost;port=3306;dbname=id4911876_churrasdatabase","id4911876_root","123456");
	// Serve para mostrar erros quando ocorrem com a conexão em geral ----- Retirar depois
	$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Conectado com sucesso";
}catch(PDOException $e){
	//Tratamento da Excessão - Caso ocorra alguem erro na conexão com o banco de dados
	echo "Falha ao conectar com o Banco de Dados: " , $e->getMessage();
} 
?>