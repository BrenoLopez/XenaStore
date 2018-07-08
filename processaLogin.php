<?php session_start();?>
<script type="text/javascript" src="js/msgsLogin.js"></script>
<script type="text/javascript" src="js/voltar.js"></script>
<?php
include ("php/conexao.php");
include ("funcoes.php");
$email = $_POST['email'];
$senha = $_POST['senha'];



  $usuario = buscaUsuario($conectar,$email,$senha);

  if($usuario['email'] == $email && $usuario['senha'] == $senha){
    $_SESSION['idusuario']= $usuario['idusuario'];
    $_SESSION['email']= $usuario['email'];?>
      <script type="text/javascript">
         location.href='index.php';
         logadoSucesso();
        </script>
 <?php }else{?>
      <script type="text/javascript">
        validacao();
        voltaPagina();
      </script>
 <?php }die();
  ?>