<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();
// Inicia a sessão

Class MenuRodape
{

    private $camisas;
    private $moletons;
    private $canecas;
    private $posters;
    private $acessorios;
    private $fixo;
    //classe que define o codigo do menu em qualquer página
    function menu()
    {
        ?>
        <!-- Barra de navegação colocar como metodo de classe php-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand " href="../views/index.php"><img src="../img-fixa/logo.jpeg" width="120px" height="75px" style="margin-top:  5px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item <?= $this->getCamisas(); ?>">
                    <a class="nav-link " href="../../Cliente/views/Camisas.php">Camisas</a>
                    </li>
                    <li class="nav-item <?= $this->getMoletons(); ?>">
                        <a class="nav-link" href="../../Cliente/views/Moletons.php">Moletons</a>
                    </li>
                    <li class="nav-item <?= $this->getCanecas(); ?>">
                        <a class="nav-link " href="../../Cliente/views/Canecas.php">Canecas</a>
                    </li>
                    <li class="nav-item <?= $this->getPosters(); ?>">
                        <a class="nav-link " href="../../Cliente/views/Posters.php">Posters</a>
                    </li>
                    <li class="nav-item <?= $this->getAcessorios(); ?>">
                        <a class="nav-link " href="../../Cliente/views/Acessorios.php">Acessórios</a>
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0 ml-2" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Faça sua busca aqui">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                
                <a href="../views/Carrinho.php">
                    <button class="btn btn-outline-light ml-2 ">Carrinho</button>
                </a>
                <?php  if(!empty($_SESSION)){   //se tiver sessão

                 ?><a href="../../motor/controller/logout_cliente.php">
                    <button class="btn btn-outline-light ml-2 ">Sair</button>
                </a>
                <?php }else { ?>
                <a href="../../auth/login.php">
                    <button class="btn btn-outline-light ml-2 ">Cadastrar/Login</button>
                </a>
                <?php } ?>

            </div>
        </nav>


        <?php
    }
    function Rodape()
    {
?>

        <!-- Footer -->
        <footer class="py-5 bg-dark <?= $this->getFixo();?>">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; XenaStore 2018</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php

    }

    public function setCamisas($camisas)
    {
        $this->camisas = $camisas;
        return $this;
    }


    public function getCamisas()
    {
        return $this->camisas;
    }


    public function setMoletons($moletons)
    {
        $this->moletons = $moletons;
        return $this;
    }


    public function getMoletons()
    {
        return $this->moletons;
    }


    public function setCanecas($canecas)
    {
        $this->canecas = $canecas;
        return $this;
    }

    public function getCanecas()
    {
        return $this->canecas;
    }


    public function setPosters($posters)
    {
        $this->posters = $posters;
        return $this;
    }

    public function getPosters()
    {
        return $this->posters;
    }


    public function setAcessorios($acessorios)
    {
        $this->acessorios = $acessorios;
        return $this;
    }

    public function getAcessorios()
    {
        return $this->acessorios;
    }

    public function setFixo($fixo)
    {
        $this->fixo = $fixo;
        return $this;
    }

    public function getFixo()
    {
        return $this->fixo;
    }



}
?>
