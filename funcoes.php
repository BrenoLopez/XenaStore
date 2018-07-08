<?php
include_once ("php/conexao.php");
function cadastraCliente($conectar,$nome,$sobrenome,$email,$endereco,$ddd,$telefone,$senha){

    $cadastra= $conectar->prepare("INSERT INTO clientes (nome,sobrenome,endereco,ddd,telefone) VALUES (:nome,:sobrenome,:endereco,:ddd,:telefone)");
    $cadastra->bindParam(':nome',$nome);
    $cadastra->bindParam(':sobrenome',$sobrenome);
    $cadastra->bindParam(':endereco',$endereco);
    $cadastra->bindParam(':ddd',$ddd);
    $cadastra->bindParam(':telefone',$telefone);
    $cadastra->execute();

    $selectIdCliente = $conectar->prepare("select idCliente from clientes");
    $selectIdCliente->execute();

    while ($consulta= $selectIdCliente->fetch(PDO::FETCH_ASSOC)){

        $id = $consulta['idCliente'];
        $conversao = array($id);
        $utlimoCliente = end($conversao);
    }

    $cadastrarUsuario = $conectar->prepare("insert into usuarios(idCliente,email,senha) values (:idCliente,:email,:senha)");
    $cadastrarUsuario->bindParam(':idCliente',$utlimoCliente);
    $cadastrarUsuario->bindParam(':email',$email);
    $cadastrarUsuario->bindParam(':senha',$senha);
    $cadastrarUsuario->execute();
}


function buscaUsuario($conectar,$email,$senha){

   $busca= $conectar->prepare("SELECT * from usuarios where email LIKE '%$email%' and senha like '%$senha%'");
   $busca->execute();
   $usuario = $busca->fetch(PDO::FETCH_ASSOC);
   return $usuario;
}

?>

