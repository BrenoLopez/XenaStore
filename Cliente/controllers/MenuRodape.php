<?php
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
            <a class="navbar-brand " href="../../../XenaStore/Cliente/index.php"><img src="">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    <li class="nav-item <?= $this->getCamisas(); ?>">
                    <a class="nav-link " href="../../../XenaStore/Cliente/views/Camisas.php">Camisas</a>
                    </li>
                    <li class="nav-item <?= $this->getMoletons(); ?>">
                        <a class="nav-link" href="#">Moletons</a>
                    </li>
                    <li class="nav-item <?= $this->getCanecas(); ?>">
                        <a class="nav-link " href="views/Canecas.php">Canecas</a>
                    </li>
                    <li class="nav-item <?= $this->getPosters(); ?>">
                        <a class="nav-link " href="#">Posters</a>
                    </li>
                    <li class="nav-item <?= $this->getAcessorios(); ?>">
                        <a class="nav-link " href="#">Acessórios</a>
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0 ml-2" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Faça sua busca aqui">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>


                <a href="">
                    <button class="btn btn-outline-light ml-2 ">Cadastrar/Login</button>
                </a>
                <a href="">
                    <button class="btn btn-outline-light ml-2 ">Carrinho</button>
                </a>

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
        /**
     * @param mixed $camisas
     * @return MenuRodape
     */
    public function setCamisas($camisas)
    {
        $this->camisas = $camisas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCamisas()
    {
        return $this->camisas;
    }

    /**
     * @param mixed $moletons
     * @return MenuRodape
     */
    public function setMoletons($moletons)
    {
        $this->moletons = $moletons;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoletons()
    {
        return $this->moletons;
    }

    /**
     * @param mixed $canecas
     * @return MenuRodape
     */
    public function setCanecas($canecas)
    {
        $this->canecas = $canecas;
        return $this;
    }

    public function getCanecas()
    {
        return $this->canecas;
    }

    /**
     * @param mixed $posters
     * @return MenuRodape
     */
    public function setPosters($posters)
    {
        $this->posters = $posters;
        return $this;
    }

    public function getPosters()
    {
        return $this->posters;
    }

    /**
     * @param mixed $acessorios
     * @return MenuRodape
     */
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
