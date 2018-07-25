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

  <title>Informações do produto - XenaStore</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/modern-business.css" rel="stylesheet">
  <link rel="stylesheet" href="../vendor/bootstrap/js/bootstrap.min.js">
  <!-- <link href="../../Cliente/css/Camisas_css.css" rel="stylesheet"> -->
  <link rel="shortcut icon" type="image/x-icon" href="../img-fixa/favicon.ico">
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
  <br>
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
                  <input class="form-control" id="valor"  name="valor" type="text" aria-describedby="nameHelp" disabled value="<?php echo $prod['valor']; ?>">
                </div>
                <div class="col-sm">
                  Quantidade Disponivel:
                  <input class="form-control" id="quant_disponivel"  name="quant_disponivel" type="text" aria-describedby="nameHelp" disabled value=" <?php echo $prod['quantidade']; ?>">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm">
                  <div class="col-md-8">
                   <div class="form-group">
                    <label for="exampleFormControlSelect1">Tamanho</label>
                    <select class="form-control" id="tamanho" name="tamanho">
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

                <input type="hidden" name="data_pedido" id="data_pedido" value="<?php echo date('d/m/Y') ?>">
                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                <input type="hidden" name="id_produto" id="id_produto" value="<?php  echo $_GET['id']?>">

                <input type="hidden" name="name_product" id="name_product" value="<?php echo $prod['name_product']?>">
                <input type="hidden" name="valor" id="valor" value="<?php echo $prod['valor']?>">
                <input type="hidden" name="category" id="category" value="<?php echo $prod['category']?>">
                <input type="hidden" name="quantidade" id="quantidade" value="<?php echo $prod['quantidade']?>">
                <input type="hidden" name="descricao" id="descricao" value="<?php echo $prod['descricao']?>">
                <input type="hidden" name="imagem" id="imagem" value="<?php echo $prod['imagem']?>">
                <input type="hidden" name="tema" id="tema" value="<?php echo $prod['tema']?>">

              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-sm-12"></div>
              <div class="col-sm-4" style="margin-left: 13px">
                <!-- <a href="Carrinho.php?id=<?php echo $prod['id_product']; ?>" id="continuar"> -->
                  <button type="button" class="btn btn-primary" id="continuar">Continuar</button>
                  <!-- </a> -->

                </div>
                <div style="margin-left: 120px;">
                <script>
                    document.write('<a href="' + document.referrer + '"><button class="btn btn-danger">Voltar</button></a>');
                </script>
                <a href="javascript:history.back()"></a>
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

<script src="../js/jquery.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="..js/toastr.min.js"></script>

<script type="text/javascript">


  $(document).ready(function(e) {
    $('#continuar').click(function(e) {
      
      //vaeriaves da tabela pedido 
      var quantidade = $('#quantidade').val();
      var quant_disponivel = $('#quant_disponivel').val();
      var tamanho = $('#tamanho').val();
      var valor = $('#valor').val();
      var data_pedido = $('#data_pedido').val();
      var id_user = $('#id_user').val();
      var id_produto = $('#id_produto').val();
      var  valor_total =quantidade*valor;

      //variaveis do produto para atualizar a quantidade desse produto;
  
      var name_product = $('#name_product').val();
      var valor = $('#valor').val();
      var category = $('#category').val();
      var descricao = $('#descricao').val();
      var imagem = $('#imagem').val();
      var tema = $('#tema').val();
     
    
      alert(imagem);

      if(!quantidade || !tamanho ){
       swal("Atenção!", "Todos os campos devem ser preenchidos!", "info");
     }else if(  parseInt(quantidade) > parseInt(quant_disponivel)) {
       swal("Atenção!", "Quantidade de Produto Inssuficiente!", "info");
     }else{
         var quant_aux= quant_disponivel - quantidade;

        $.ajax({
         url: '../../motor/controller/pedido.php',
         data: {

          id_user : id_user,
          id_produto: id_produto,
          situacao: 0,
          data_pedido: data_pedido,
          quantidade : quantidade,
          valor_total :valor_total,
          tamanho : tamanho,
          forma_pagamento : '-',

          action: 'create'
        },

        type: 'POST'
      });

       $.ajax({
         url: '../../motor/controller/produto.php',
         data: {

          id_product : id_produto,
          name_product : name_product,
          valor : valor,
          category : category,
          quantidade : quant_aux,
          descricao : descricao,
          imagem : imagem,
          tema : tema,

          action: 'update'
        },

        success: function(data) {
          console.log(data);


// não ta retornando true pois não estou passando o id do pedido pois e auto-increment
          if(data !='true'){
            setTimeout(function(){
             window.location = 'Carrinho.php?id='+id_produto;
           },100);
          }else{

            swal("Atenção", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.", "error");
          }
        },

        type: 'POST'

      });
     }

   });
  });
</script>