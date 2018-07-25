<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Moletons - XenaStore</title>

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
require_once '../controllers/Slides.php';
require_once '../../motor/requeridos.php';

$slides = new Slides();
$MenuRodape  = new MenuRodape();
$MenuRodape->setPosters("active");
$MenuRodape->menu();
$slides->setImg1('../img-fixa/posters/poster1.png');
$slides->setImg2('../img-fixa/posters/poster2.jpg');
$slides->setImg3('../img-fixa/posters/poster3.jpg');
$slides->codSlide();
?>

<?php
// funÃ§Ã£o que recupera o produto de acordo com sua categoria
$prod= new Produto();
$prod= $prod->ReadProduto('Posters');
?>
<!-- Page Content -->
<div class="container">
    <h1 class="my-4">Posters</h1>
    <hr>
    <!-- Marketing Icons Section -->
    <div class="row">

        <?php  foreach ($prod as $prod) {

            ?>
            <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <h5 class="card-header"> <?php echo $prod['name_product'];?> </h5>
                        <div class="card-body">
                            <img src="<?php echo $prod['imagem']; ?>" style="width: 100%; " >
                            <p class="card-text"> <strong> Valor R$: <?php echo $prod['valor'];?> </strong> </p>
                        </div>
                        <div class="card-footer">
                            <a href="../views/Info_Produto.php?id=<?php echo $prod['id_product']; ?>" class="btn btn-primary">Adicionar ao Carrinho</a>
                        </div>
                    </div>
                </div>
        <?php  } ?>

    </div>
</div>
<!-- /.row -->

<?php
//$MenuRodape->setFixo("fixed-bottom");
$MenuRodape->Rodape();

?>

</body>