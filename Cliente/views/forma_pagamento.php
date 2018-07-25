    <!DOCTYPE html>
    <html lang="pt-br">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>XenaStore</title>

      <!-- Bootstrap core CSS -->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="../css/modern-business.css" rel="stylesheet">
      <link rel="stylesheet" href="../vendor/bootstrap/js/bootstrap.min.js">
      <link href="../../Cliente/css/Camisas_css.css" rel="stylesheet">
    </head>

    <body>

      <?php
      require_once '../controllers/MenuRodape.php';
      require_once '../../motor/requeridos.php';
      $MenuRodape  = new MenuRodape();
      $MenuRodape->setCamisas("active");
      $MenuRodape->menu();
      ?>

      <?php
  // funÃ§Ã£o que recupera o produto de acordo com sua categoria 
      $prod= new Produto();
      $prod= $prod->Read($_GET['id']);

      ?>


      
      <div class="container">
       <h1 class="my-4">Formas de Pagamento</h1>
       <br><br>
       <div class="row">

        <div class="col">
          <div class="col-xl-12 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Boleto Bancário</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pagament_boleto.php?id=<?php echo $_GET['id']; ?>">
                <span class="float-left">Continuar</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col">
          
          <div class="col">
          <div class="col-xl-12 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"> Cartão de Crédito</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pagament_cartao.php?id=<?php  echo $_GET['id']?>">
                <span class="float-left">Continuar</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        </div>
      </div>
      <br><br>
      <button type="button" class="btn btn-primary">Voltar</button>
    </div>




    <!-- /.container -->
    <?php
    $MenuRodape->setFixo("fixed-bottom");
    $MenuRodape->Rodape();

    ?>

  </body>
