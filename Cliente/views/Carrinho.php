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

    <title>Carrinho - XenaStore</title>

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
<div class="row justify-content-between">
    <div class="col-4">
<h1>Produtos:</h1>
    </div>
    <div class="col-4">
        <h1>Entrega:</h1>
    </div>

</div>
<div class="row">

    <div class="table-responsive col-md-8">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>Imagem</th>
                <th>Produtos</th>
                <th>Descrição</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th class="actions">Ações</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td><img src="../img-fixa/camisas/camisa.jpg" height="100px" width="100px"></td>
                <td>Jes</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                <td>P</td>
                <td>12</td>
                <td>90,80</td>
                <td class="actions">
                    <a class="btn btn-warning btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Remover</a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class="col-3" style="border: 2px solid black;background-color: darkgray">
    Endereço: Rua Mariana higina
        <br>
    Bairro: Sagrado coração de Jesus
        <br>
    Número: 96A
        <br>
        <h3>Frete</h3>
        Valor: 25,00
        <br>
        <!--provisorio fazer for pra pegar tds os ids -->
        <?php
        $prod= new Produto();
        $prod= $prod->Read($_GET['id']);
        ?>
        <a href="forma_pagamento.php?id=<?php echo $prod['id_product']; ?>"><button class="btn btn-dark">Finalizar compra</button></a>
    </div>
    <div class="container" style="padding-left: 550px;">
    <script>
        document.write('<a href="' + document.referrer + '"><button class="btn btn-danger">Voltar</button></a>');
    </script>
    <a href="javascript:history.back()"></a>
    </div>
</div>


<?php
$MenuRodape->setFixo("fixed-bottom");
$MenuRodape->Rodape();

?>
</body>
