    <!DOCTYPE html>
    <html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Informações do produto - XenaStore</title>

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
        $MenuRodape->menu();
        ?>

        <?php
  // funÃ§Ã£o que recupera o produto de acordo com sua categoria 
        $prod= new Produto();
        $prod= $prod->Read($_GET['id']);

        ?>

        <div class="container" >
            <h1 class="my-4">Informações do produto</h1>
            <!-- Lista de alguns produtos randomicos do banco de dados -->
            <div class="row">
                <div class="col-12">
                    <div class="row">

                     <div class="col-lg-6 mb-5">
                      <div class="card h-100">
                        <h4 class="card-header "><?php echo $prod['name_product']; ?></h4>
                        <div class="card-body">
                          <img   style="width: 300px; height: 300px; margin-left: 90px; " src="<?php echo $prod['imagem']; ?>" >

                      </div>
                  </div>
              </div>

              <div class="col-lg-6 mb-5">
                  <div class="card h-100">
                    <h4 class="card-header ">Descrição</h4>
                    <p> <?php echo $prod['name_product']; ?></p>
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                            Valor:
                            <input class="form-control" id="quantidade"  name="quantidade" type="text" aria-describedby="nameHelp" disabled value=" <?php echo $prod['valor']; ?>">
                        </div>
                        <div class="col-sm">
                            Quantidade Disponivel:
                             <input class="form-control" id="quantidade"  name="quantidade" type="text" aria-describedby="nameHelp" disabled value=" <?php echo $prod['quantidade']; ?>">
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm">
                        <div class="col-md-8">
                           <div class="form-group">
                            <label for="exampleFormControlSelect1">Tamanho</label>
                              <select class="form-control" id="category" name="category">
                                <option value="null"> Selecione</option>
                                <option value="P">P</option>
                                <option value="M">M</option>
                                <option value="G">G</option>
                                <option value="GG">GG</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                  <div class="col-md-12">
                      <label for="exampleInputName">Quantidade</label>
                      <input class="form-control" id="quantidade"  name="quantidade" type="number" aria-describedby="nameHelp">
                    </div>
              </div>
          </div>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-sm-12"></div>
          <div class="col-sm-4">
            <a href="Carrinho.php?id=<?php echo $prod['id_product']; ?>">
              <button type="button" class="btn btn-primary">Continuar</button>
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
//$MenuRodape->setFixo("fixed-bottom");
$MenuRodape->Rodape();

?>

</body>
