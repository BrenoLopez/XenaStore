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
    document.location.href = '../../auth/login.php';
  </script>
  <?php
}
 ?>
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
      <link rel="shortcut icon" type="image/x-icon" href="../img-fixa/favicon.ico">
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
  // função que recupera o produto de acordo com sua categoria 
      $prod= new Produto();
      $prod= $prod->Read($_GET['id']);

      ?>

      <div class="container" >
        <h1 class="my-4">Pagamento com Cartão</h1>
        <!-- Lista de alguns produtos randomicos do banco de dados -->
        <div class="row">
          <div class="col-12">
            <div class="row">

             <div class="col-lg-6 mb-5">
              <div class="card h-100">
                <h4 class="card-header ">Preencha os dados do Cartão</h4>
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 mb-5">
              <div class="card h-100">
                <h4 class="card-header ">Endereço de Entrega</h4>

                <div class="card-body">
                  <div class="container">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="formGroupExampleInput">Example label</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-sm-4">
                      <a href="finalizar_compra.php?id=<?php echo $prod['id_product']; ?>">
                        <button type="button" class="btn btn-success">Continuar</button>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>




    <!-- /.container -->
    <?php
    $MenuRodape->setFixo("fixed-bottom");
    $MenuRodape->Rodape();

    ?>

  </body>
