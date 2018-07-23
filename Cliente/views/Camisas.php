    <!DOCTYPE html>
    <html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Camisas - XenaStore</title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/modern-business.css" rel="stylesheet">
        <link rel="stylesheet" href="../vendor/bootstrap/js/bootstrap.min.js">
    </head>

    <body>

    <?php
    require_once '../controllers/MenuRodape.php';

    $MenuRodape  = new MenuRodape();
    $MenuRodape->setCamisas("active");
    $MenuRodape->menu();

    ?>
    <div class="container">
    <div class="col">
    

    </div>
    </div>

   <div class="container">
    <!-- Lista de alguns produtos randomicos do banco de dados -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card h-100" style="text-align: center">
                <h4 class="card-header" >Nome produto do banco</h4>
                <div class="card-body" >
                    <a href="#" ><img src="" >Foto do produto</a>
                    <p class="card-text">Descricao do produto do banco</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                </div>
            </div>
        </div>

    </div>
    <hr>
    </div>
    <!-- /.container -->

    <?php
    $MenuRodape->setFixo("fixed-bottom");
    $MenuRodape->Rodape();

    ?>

    </body>