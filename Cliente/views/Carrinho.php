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
    <link rel="shortcut icon" type="image/x-icon" href="../img-fixa/favicon.ico">
</head>

<body>

    <?php
    require_once '../controllers/MenuRodape.php';
    require_once '../../motor/requeridos.php';
    $MenuRodape  = new MenuRodape();
    $MenuRodape->setCamisas("active");
    $MenuRodape->menu();

    $prod= new Produto();
    $prod= $prod->Read($_GET['id']);

    $ped= new Pedido();
    $ped= $ped->ReadPedidos($_SESSION['id_user']);

    $user= new User();
    $user= $user->Read($_SESSION['id_user']);


    ?>

    <br><br><br><br>
    <div class="row justify-content-between">
        <div class="col-4">
            <h1>Produtos</h1>
        </div>
        <div class="col-4">
            <h1>Entrega</h1>
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
                   <?php  foreach ($ped as $ped2) {
                    ?>
                    <tr>
                        <td><img src="<?php echo $ped2['imagem']; ?>" height="100px" width="100px"></td>
                        <td><?php echo $ped2['category']; ?></td>
                        <td><?php echo $ped2['descricao']; ?></td>
                        <td><?php echo $ped2['tamanho']; ?></td>
                        <td><?php echo $ped2['quantidade']; ?></td>
                        <td><?php echo  $ped2['valor_total']; ?></td>
                        
                        <td class="actions">
                            <a  href="../../motor/controller/pedido.php?id_pedido=<?php echo $ped2['id_pedido'];?>&action=<?='delete'?>" class="btn btn-warning btn-xs" id="remover"  data-toggle="modal" data-target="#delete-modal">Remover
                            </a>
                        </td>

                    </tr>
                    <?php 

                }
                ?>
            </tbody>
        </table>

    </div>

    <div class="col-3" style="border: 2px solid black;background-color: darkgray">
        <table class="table">
    <tbody>
      <tr>
        <td>Estado</td>
        <td><?php echo $user['estado'] ?></td>
      </tr>
      <tr>
        <td>Cidade</td>
        <td><?php echo $user['cidade'] ?></td>
      </tr>
      <tr>
        <td>Bairro</td>
        <td><?php echo $user['bairro'] ?></td>
      </tr>
      <tr>
        <td>N°</td>
        <td><?php echo $user['numero'] ?></td>
      </tr>
      <tr>
        <td>Frete</td>
        <td>calcular pelo frete</td>
      </tr>
    </tbody>
  </table>
        <!--provisorio fazer for pra pegar tds os ids -->

        <a href="index.php"><button class="btn btn-dark">Voltar</button></a>

        <a href="forma_pagamento.php?id=<?php echo $prod['id_product']; ?>"><button class="btn btn-success">Finalizar compra</button></a>
    </div>


</div>
</body>
</html>


<script src="../js/jquery.js"></script>
<script src="../js/sweetalert.js"></script>
<script src="..js/toastr.min.js"></script>

<script type="text/javascript">

  //  function remover(id){
  
  // alert(id);
  //  }



  $(document).ready(function(e) {
    $('#remover').click(function(e) {
      

      alert("ok");

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