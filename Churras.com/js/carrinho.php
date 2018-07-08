<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de compras</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="carrinho.php">Carrinho</a>
                </li>

                <li class="nav-item">
                    <a  href="login.php"> <button type="button" class="btn btn-primary" href="login.html">Cadastrar/Login</button></a>
                </li>
                <?php
                    if(isset($_SESSION['idusuario'])){ ?>
                    <li class="nav-item" style="padding-left: 10px;">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogout">Logout</button>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>

<div id="list" class="row">

    <div class="table-responsive col-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Qtd</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td></td>
                <td><select class="form-control col-lg-3">
                    <option value=""></option>
                    <option value="1" label="1" id="op1"> 1 </option>
                    <option value="2" label="2" id="op2"> 2 </option>
                    <option value="3" label="3" id="op3"> 3 </option>
                    <option value="4" label="4" id="op4"> 4 </option>
                    <option value="5" label="5" id="op5"> 5 </option>
                    <option value="6" label="6" id="op6"> 6 </option>
                    <option value="7" label="7" id="op7"> 7 </option>
                    <option value="8" label="8" id="op8"> 8 </option>
                    <option value="9" label="9" id="op9"> 9 </option>
                    <option value="10" label="10" id="op10"> 10 </option>
                </select>
                </td>
                <td>
                    <input type="number" step="0.01" placeholder="Outra quantidade">
                    <a class="btn btn-danger btn-xs" href="#">Excluir</a>
                </td>

            </tr>


            </tbody>
        </table>
    </div>

    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>Total da compra</th>
            </tr>
            </thead>
            <tbody>

            <!-- total acumulado da comrpa-->
            <tr>
                <td>R$</td>
            </tr>
            </tbody>
        </table>
    </div>

</div> <!-- /#list -->
<a href="finalizaCompra.php" style="padding-left: 2px;" ><button type="button" class="btn btn-primary">Finalizar compra</button></a>


<!-- Footer -->
<footer class="py-5 bg-dark fixed-bottom ">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Churras.com</p>
    </div>
    <!-- /.container -->
</footer>
<?php include ("modalLogout.php"); ?>
</body>
</html>
