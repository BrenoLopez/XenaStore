<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">
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
                    <a class="nav-link" href="index.php">Inicío
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrinho.php">Carrinho</a>
                </li>

                <li class="nav-item" style="padding-right: 5px">
                    <a href="login.php"><button type="button" class="btn btn-primary" href="login.html">Cadastrar/Login</button></a>
                    <?php
                    if(isset($_SESSION['idusuario'])){?>

                <li class="nav-item" style="padding-left: 10px;">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogout">Logout</button>
                </li>
                <?php }?>
                </li>

            </ul>
        </div>
    </div>
    </div>
</nav>
<div class="form-control "  >
    <form class="form-inline" action="#" method="post">
        <input class="form-control mr-sm-2 col-lg-11 col-sm-9" type="search" placeholder="Pesquisar" aria-label="Pesquisar" name="pesquisa">
        <button class="btn btn-outline-primary my-sm-0" type="submit">Pesquisar</button>
    </form>
</div>

<!-- Page Content -->
<div class="container row" style="margin-bottom: 10px;">

        <div class="col-lg-3">
            <h1 class="my-4" >Categorias</h1>
            <div class="list-group barra-lateral">
        <!-- chama os itens pelas suas respectivas categorias-->
                <a href="#" class="list-group-item item-categoria"><img src="img/carne-icon.png"></a>
                <a href="#" class="list-group-item item-categoria"><img src="img/item-icon.png"></a>
            </div>
        </div>
    <?php
    include_once "php/conexao.php";
    //execução da instrução Sql
    $consulta = $conectar->query("SELECT *
                                      FROM items i join imagem g WHERE i.iditem=g.iditem ");?>

    <?php while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){?>

        <div class="col-lg-3 col-md-4 mb-2" style="padding-top: 95px;">
            <div class="card h-70" style="width: 225px">
                <a href="#" ><img class="card-img-top" src="img/<?=$linha['nome']?>" width="225px" height="225px"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#"><?php echo "$linha[nomeproduto]";?></a>
                    </h4>
                    <h5>R$ <?php echo "$linha[precovenda]";?></h5>
                    <p class="card-text"><?php echo "$linha[descricao]";?></p>
                </div>
                <div class="card-block">
                    <a href="#" class="button btn-cart">Adicionar Carrinho</a>
                </div>
            </div>
        </div>

    <?php } ?>
        
</div>

<!-- /.container -->
<?php include ("modalLogout.php");?>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Churras.com</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>