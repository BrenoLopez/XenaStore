<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();

session_name(sha1($_SERVER['HTTP_USER_AGENT'].$_SESSION['email']));

if(empty($_SESSION)){
  ?>
  <script>
    document.location.href = '../../../auth';
  </script>
  <?php
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1201)) {
  session_unset();
  session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
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
            <li>
              <a href="cards.html">Entregues</a>
            </li>
            <li>
              <a href="cards.html">Cancelados</a>
            </li>
            <li>
              <a href="cards.html">Novos</a>
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
              <a href="home_estoque.php">Produtos</a>
            </li>
            <li>
              <a href="register.html">Produtos Esgotados</a>
            </li>
            <li>
              <a href="forgot-password.html">Produtos com Defeito</a>
            </li>
            <li>
              <a href="blank.html">Categorias</a>
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
              <a href="../user/cliente.php" id="cadastro_user">Clientes</a>
            </li>
            <li>
              <a href="../user/func.php">Funcionários</a>
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
            <a href="#">Estoque</a>
          </li>
          <li class="breadcrumb-item active"></li>
        </ol>
       
       <br><br><br> 
    <!-- Icon Cards-->
    <br><br><br>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-xl-5 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
           <a class="card-footer text-white clearfix small z-1" href="add_produtos.php">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw  fa-cart-plus"></i>
            </div>
           <h3> <div class="mr-5">Cadastrar Produtos</div> </h3>
          </div>
          </a>
        </div>
      </div>

       <div class="col-xl-5 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
           <a class="card-footer text-white clearfix small z-1" href="listar_produtos.php">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-th-list"></i>
            </div>
           <h3> <div class="mr-5">Listar Produtos</div> </h3>
          </div>
          </a>
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
               <a class="btn btn-primary" href="../../../auth/login.html">Sair</a>
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
      <script src="../../vendor/datatables/jquery.dataTables.js"></script>
      <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="../../js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="../../js/sb-admin-datatables.min.js"></script>
      <script src="../../js/sb-admin-charts.min.js"></script>
    