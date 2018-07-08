<?php session_start();
 if(isset($_SESSION['idusuario'])){ ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Finalizar compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
    <div class="container">
        <a  class="navbar-brand" href="index.php">Churras</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicío</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrinho.php">Carrinho</a>
                </li>

                <li class="nav-item">
                    <a  href="login.php"><button type="button" class="btn btn-primary" href="login.html">Cadastrar/Login</button></a>
                </li>

                    <li class="nav-item" style="padding-left: 10px;">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogout">Logout</button>
                    </li>

            </ul>
        </div>
    </div>
</nav>
<div class="row" style="padding-bottom: 130px">
<div class="container" style=" border: black solid 2px;">
        <h1 align="center">Finalize sua compra</h1>
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                </thead>
                <tbody>

                <!-- cria uma lista associativa com os dados das tabelas-->
                <tr>
                    <td>variavel php</td>
                    <td>variavel php</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div> <!-- /#list -->



    <div  style=" margin-top: 100px;margin-bottom: 10px;">
        <form class="form-control" action="">
            <h4 style="margin-left: 5px;">Endereço de entrega:</h4>
            <input class="form-group " type="radio" name="endEntrega" value="1" checked>Endereço cadastrado
            <br>
            <input class="form-group" data-toggle="modal" data-target="#modal-endNovo" type="radio" name="endEntrega" value="2">Novo Endereço

            <table class="table">

                <th>Endereço cadastrado:</th>

                <tr>
                    <td class="table-active">variavel php do endereço cadastrado</td><br>
                </tr>

            </table>
            <table class="table">

                <tbody>
                <h4 style="margin-left: 5px;">Forma de pagamento:</h4>
                    <tr>
                       <input class="form-group " type="radio" name="formaPag"> Cartão
                        <br>
                        <input class="form-group"  type="radio" name="formaPag">Dinheiro
                    </tr>
                </tbody>

            </table>
                <button type="submit" class="btn btn-secondary">Comprar</button>
                <a href="carrinho.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
        </form>

    </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-endNovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Novo endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form  action="#" method="post">
                            <label for="endNovo">Novo endereço:</label>
                            <input type="text" class="form-control" id="endNovo" name="endNovo" placeholder="Digite o novo endereço de entrega" required>
                </form>

                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">sair</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<footer class="py-5 bg-dark fixed-bottom" style="margin-top: 20px;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Churras.com</p>
    </div>
    <!-- /.container -->
</footer>
<?php include ("modalLogout.php");?>
</body>
</html>
<?php }else{
    header('location:login.php');}?>
