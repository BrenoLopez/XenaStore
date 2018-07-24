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

  // função que recupera o produto de acordo com sua categoria 
      $prod= new Produto();
      $prod= $prod->Read($_GET['id']);

      ?>

      <div class="container" >
        <h1 class="my-4">Finalizar Compra</h1>
        <hr>
        <!-- Lista de alguns produtos randomicos do banco de dados -->
        <div class="row">
          <div class="col-12">
            <div class="row">
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col">
               <h2> Informações Pessoais</h2>
              </div>
            
              <div class="col">
                <h2> Endereço</h2>
              </div>
              <div class="col">
                <h2> Informações do Produto</h2>

              </div>
            </div>

            <div class="row">
              <div class="col">
               <span>asasas</span>
              </div>
            
              <div class="col">
                 <span>asasas</span>
              </div>
              <div class="col">
                 <span>asasas</span>

              </div>
            </div>
            <br><br>
            <button type="button" class="btn btn-success btn-lg btn-block">Confirmar Compra</button>
          </div>



          <!-- /.container -->
          <?php
          $MenuRodape->setFixo("fixed-bottom");
          $MenuRodape->Rodape();

          ?>

        </body>
