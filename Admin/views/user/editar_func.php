<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();
// Inicia a sessão

session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));

if(empty($_SESSION)){
  ?>
  <script>
    document.location.href = '../../../auth/login.php';
  </script>
  <?php
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title id="title"> XenaStore</title>
  <!-- Bootstrap core CSS-->
  
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <?php  require "../../../motor/requeridos.php" ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">LOGO</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" id="home" href="../../index.php">
            <i class="fa fa-fw fa-home fa-5x"></i>
            <span  class="nav-link-text">Home </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list fa-5x"></i>
            <span class="nav-link-text">Pedidos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Todos os Pedido</a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file fa-5x"></i>
            <span class="nav-link-text">Estoque</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="../estoque/home_estoque.php"> Produtos</a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user fa-5x"></i>
            <span class="nav-link-text">Usuarios</span>
          </a>

          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="cliente.php" id="cadastro_user">Clientes</a>
            </li>
            <li>
              <a href="func.php">Funcionários</a>
            </li>

          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="func.php">Funcionarios</a>
          </li>
          <li class="breadcrumb-item active"> Editar</li>
        </ol>

   <?php 

   $user= new User();
   $user= $user->read($_GET['id']);
   ?>


        <!-- Form add func-->
        <div class="container">
          <div class="card  mx-auto mt-5">
            <div class="card-header">Cadastrar conta</div>
            <div class="card-body">
              <form action="../../../motor/controller/user.php" id="target" method="Post">
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="exampleInputName">Primeiro Nome</label>
                      <input class="form-control" id="first_name"  name="first_name" type="text" aria-describedby="nameHelp" placeholder="Primeiro Nome" value="<?php  echo $user['first_name']?>">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputLastName">Sobrenome</label>
                      <input class="form-control" id="last_name" name="last_name" type="text" aria-describedby="nameHelp" placeholder="Sobrenome" value="<?php  echo $user['last_name']?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input class="form-control" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Digite seu email" value="<?php  echo $user['email']?>">
                </div>

                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label for="exampleInputName">CPF</label>
                      <input class="form-control" id="cpf" name="cpf" type="number" aria-describedby="nameHelp" placeholder="000.000.000.00" value="<?php  echo $user['cpf']?>">
                    </div>
                    <div class="col-md-6">
                      <label for="exampleInputLastName">Senha</label>
                      <input class="form-control" id="password" type="password" name="password" aria-describedby="nameHelp" placeholder="Digite sua senha">
                    </div>
                    <input type="hidden" name="telefone" value="-">
                    <input type="hidden" name="endereco" value="-">
                    <input type="hidden" name="cep" value="-">
                    <input type="hidden" name="tipo" value="1">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id_user" value="<?php  echo $_GET['id']; ?>">
                  </div>
                </div>
                <button  type="submit" class="btn btn-success btn-block" id="cadastrar">Salvar</button>

              </form>
            </div>
          </div>
        </div>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
          <div class="container">
            <div class="text-center">
              <small>Copyright © Your Website 2018</small>
            </div>
          </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Realmente deseja sair?</div>
              <div class="modal-footer" id="sair">
                <button  class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="../../../motor/controller/logout.php">Sair</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>

    <script type="text/javascript"> </script>
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="../../vendor/datatables/jquery.dataTables.js"></script> -->
    <!-- <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script> -->
    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <!-- <script src="../../js/sb-admin-datatables.min.js"></script> -->
    <!-- <script src="../../js/sb-admin-charts.min.js"></script> -->


 <script type="text/javascript">

   $(document).ready(function(e) {

     $('#cadastrar').click(function(e) {
      e.preventDefault();
      
      var first_name= $('#first_name').val();
      var last_name= $('#last_name').val();
      var cpf= $('#cpf').val();
      var email= $('#email').val();
      var password= $('#password').val();

      if(!first_name || !last_name || !cpf || !email || !password){
        return alert("todos os campos devem ser preenchidos!!")
      }else {
          //enviando formulario 
          $( "#target" ).submit();
     }   
   });
   });
 </script>