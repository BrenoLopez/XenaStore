<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home - XenaStore</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap/js/bootstrap.min.js">
  </head>
  <body>

<?php
require_once '../motor/requeridos.php';
require_once 'controllers/MenuRodape.php';

$MenuRodape  = new MenuRodape();
$MenuRodape->menu();
?>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img-fixa/camisas/camisa5.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>descrição.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img-fixa/camisas/camisa2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>descrição.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img-fixa/camisas/camisa3.jpg')">
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
  // funÃ§Ã£o que recupera o produto de acordo com sua categoria 
   $prod= new Produto();
   $prod= $prod->ReadProduto('Camisa');


?>
    <!-- Page Content -->
    <div class="container">
      <h1 class="my-4">Produtos em Destaque</h1>
      <hr>
      <!-- Marketing Icons Section -->
      <div class="row">

      <?php  foreach ($prod as $prod) {

       ?> 
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> <?php echo $prod['name_product'];?> </h4>
            <div class="card-body">
              <img src="<?php echo $prod['imagem']; ?>" style="margin-left: 100px; max-width: 100px; " >
              <p class="card-text"> Valor R$: <?php echo $prod['valor'];?> </p>
            </div>
            <div class="card-footer">
              <a href="views/Info_Produto.php?id=<?php echo $prod['id_product']; ?>" class="btn btn-primary">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>
      <?php  } ?>
        
      </div>
    </div>
      <!-- /.row -->


<?php
$MenuRodape->Rodape();
?>


  </body>

</html>
