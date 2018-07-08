<?php 
  session_start(); 
  if(!isset($_SESSION['idadministrador'])){
    header('location: ../loginadministracao.php');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="Churras.com" content="">
  <title>Churras.com</title>
  <!-- Bootstrap core CSS-->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link rel="shortcut icon" type="imagem/x-icon" href="#"/>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation--> <!--                                                           Inicio da Barra de Navegação                                                   --> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../administracao.php">Churras.com - Administraçao</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../administracao.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pedidos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePedidos" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cart-arrow-down"></i>
            <span class="nav-link-text">Pedidos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePedidos">
            <li>
              <a href="pedidosnovos.php">Novos</a>
            </li>
            <li>
              <a href="pedidosentregues.php">Entregues</a>
            </li>
            <li>
              <a href="pedidoscancelados.php">Cancelados</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Produtos">
          <a class="nav-link" href="../produtos/produtos.php">
           <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Produtos</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuários">
          <a class="nav-link" href="../usuarios/usuarios.php">
            <i class="fa fa-fw fa-user-circle-o"></i>
            <span class="nav-link-text">Usuários</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clientes">
          <a class="nav-link" href="../clientes/clientes.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Clientes</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" href="../profile/profile.php">
            <i class="fa fa-fw fa-address-card-o"></i>
            <span class="nav-link-text">Profile</span>
          </a>
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
        <!--                                                           Item de Logout                                                            --> 
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--                                                           Fim da Barra de Navegação
                                                          -->
  <!--                                                           Inicio da Parte de Corpo                                                             -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
        <div class="row">
            <div class="col-12">
                <div id="top" class="row">
                    <div class="col-md-10">
                        <h2>Listagem de pedidos entregues</h2>
                    </div>
                </div>
        <?php
        include ("../../php/conexao.php");
        $consulta = $conectar->prepare("select * from pedidos p join clientes c on p.idcliente = c.idcliente join itemspedidos i on i.idpedido = p.idpedido where situacao like '%e%'");
        $consulta->execute();
        ?>
        <div id="list" class="row">
            <div class="table-responsive col-md-12">
                <table class='table table-striped' cellspacing='0' cellpadding='0'>
                    <thead>
                    <tr>
                        <th>Nome Cliente</th>
                        <th>Endereço</th>
                        <th>DDD</th>
                        <th>Telefone</th>
                        <th class='actions'>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
                        <tr>

                            <?php echo "<td > $linha[nome]</td>";?>
                            <?php echo "<td > $linha[endereco]</td>";?>
                            <?php echo "<td > $linha[ddd]</td>";?>
                            <?php echo "<td > $linha[telefone]</td>";?>
                            <td class='actions' >
                                <a class='btn btn-secondary btn-sm' href = '#' > Visualizar</a >

                            </td >

                        </tr>
                    <?php }?>
                    </tr>

                    </tbody>
                </table>
                <!--  Tabela Responsiva que recebe os dados dos moradores do Banco    -->
            </div>
        </div>
    </div>
  </div>
  </div>
  </div>


  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Churras.com 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!--                                   Fim da Parte de Corpo                                      -->
    <!--     Logout Modal - Verificação              -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../sessionend.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
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
  </div>
</body>

</html>
