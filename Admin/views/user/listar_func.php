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
							<a href="../estoque/home_estoque.php">Produtos</a>
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
					<li class="breadcrumb-item active"> Listar</li>
				</ol>
				<div class="row">
					<div class="col-sm-8"></div>
					<div class="col-sm-4">
						<ul>
							<li>
								<form class="form-inline my-2 my-lg-0 mr-lg-2">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Search for...">
										<span class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fa fa-search"></i>
											</button>
										</span>
									</div>
								</form>
							</li>
						</ul>
					</div>
				</div> 
				<br>

				<?php  
				$user= new User();
				$user=$user->ReadAll();

				if(empty($user)) {
					?>

					<h4 class="well"> Nenhum dado encontrado. </h4>
					<?php
				} else {

					?>
                  <h1> Funcionários Cadastrados </h1>
                  <br >
					<div class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="content table-responsive table-full-width">
											<table class="table table-hover table-striped">
												<thead>
													<th>ID</th>
													<th>Nome</th>
													<th>Sobrenome</th>
													<th>Email</th>
													<th>Cpf</th>
													<th class=" text-center">Editar</th>
													<th class=" text-center">Excluir</th>
												</thead>
												<tbody>
													<?php
													foreach($user as $user){
														?>
														<tr>
															<td><?php echo $user['id_user'];?></td>
															<td><?php echo $user['first_name'];?></td>
															<td><?php echo $user['last_name'];?></td>
															<td><?php echo $user['email']; ?></td>
															<td><?php echo $user['cpf']; ?></td>


															<td class="text-center  ">
																<a href="editar_func.php?id=<?php echo $user['id_user']; ?>" style="color: inherit;">
																	<div style="height:100%; width:100%;">
																		<span class="fa fa-edit" aria-hidden="true"></span>
																	</div>
																</a>
															</td>
															<td class="text-center">
																<a  style="color: inherit;" onclick="desativar(<?php echo $user['id_user'];?>)" href="">
																	<div style="height:100%; width:100%; color: red;">
																		<span class="fa fa-close" aria-hidden="true"></span>
																	</div>
																</a>
															</td>


														</tr>
														<?php
													     }
													   ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				?>
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


         //enviar com post para excluiir o usuario
		function desativar(id){

				if(confirm("Realmente deseja excluir esse usuário?"))
				{

					alert("Posso excluir");
					// window.location= "ativar/"+id;

				}
				else
				{
					alert("Ação cancelada");    
				}
			}

		</script>