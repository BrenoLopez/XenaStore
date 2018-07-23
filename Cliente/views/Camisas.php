<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">
   <?php  require"../../motor/requeridos.php" ?>
  </head>

  <body>

    <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand " href="../index.php"><img src="">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item ">
                    <a class="nav-link " href="Camisas.php">Camisas</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="Moletons.php">Moletons</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="Canecas.php">Canecas</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="Posters.php">Posters</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0 ml-2" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Faça sua busca aqui">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>


                <a href="../../auth/login.php">
                    <button class="btn btn-outline-light ml-2 ">Cadastrar/Login</button>
                </a>
                <a href="">
                    <button class="btn btn-outline-light ml-2 ">Carrinho</button>
                </a>

            </div>
        </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('../img-fixa/camisas/camisa5.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>descrição.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../img-fixa/camisas/camisa2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>descrição.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../img-fixa/camisas/camisa3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>descrição.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>


<?php
  // função que recupera o produto de acordo com sua categoria 
   $prod= new Produto();
   $prod= $prod->ReadProduto('Camisa');



  var_dump($prod);
?>
    
    <!-- Page Content -->
    <div class="container">
      <h1 class="my-4">Camisas</h1>
      <hr>

      <!-- Marketing Icons Section -->
      <div class="row">

      <?php  foreach ($prod as $pro) {


       ?> <?php echo $pro['id_product'];?>  
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> SD</h4>
            <div class="card-body">
              <p class="card-text">desriçãoasssssssssssssssssssssss</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Comprar</a>
            </div>
          </div>
        </div>
      <?php  } ?>
        
      </div>
    </div>
      <!-- /.row -->



    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>