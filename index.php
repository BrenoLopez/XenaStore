<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Churras</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
      <div class="container">
        <!--><a  class="navbar-brand" href="index.php">Churras</a><!-->
        <img class="d-block img-fluid" src="img/logotest.png" alt="Third slide">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicío</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produtos.php">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="carrinho.php">Carrinho</a>
            </li>

            <li class="nav-item">
             <a  href="login.php"><button type="button" class="btn btn-primary">Cadastrar/Login</button></a>
            </li>
              <?php
              if(isset($_SESSION['idusuario'])){?>

              <li class="nav-item" style="padding-left: 10px;">
                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogout">Logout</button>
              </li>
              <?php }?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row" >


        <div class="col-lg-auto" style="margin: 0 auto;float: none;">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators ">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner " role="listbox">
              <div class="carousel-item active ">
                <img class="d-block img-fluid " src="img/painel1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/painel2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/painel3.jpg" alt="Third slide">
              </div>
            </div>

            <!-- botoes do slide-->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <?php
        include_once "php/conexao.php";
        //execução da instrução Sql
        $consulta = $conectar->query("SELECT *
                                      FROM items i join imagem g WHERE i.iditem=g.iditem LIMIT 8");?>
      <div class="row">
          <?php while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){?>
          <div class="col-lg-3 col-md-4 mb-2" >
              <div class="card h-70" style="width: 225px">
                  <a href="#" > <img class="card-img-top" src="img/<?=$linha['nome']?>" width="225px" height="225px"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo "$linha[nomeproduto]";?></a>
                  </h4>
                  <h5>R$ <?php echo "$linha[precovenda]";?></h5>
                  <p class="card-text"><?php echo "$linha[descricao]";?></p>
                </div>
                <div class="card-block">
                  <a href="#" class="button btn-cart">Adicionar Carrinho</a>
                </div>
              </div>
            </div>
        <?php } ?>
      </div>
    </div>


<?php include ("modalLogout.php");?>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Churras.com</p>
      </div>
      <!-- /.container -->
    </footer>


  </body>

</html>
