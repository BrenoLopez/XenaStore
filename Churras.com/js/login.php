<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link  href="css/estilo.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/funcao-login.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/confereSenha.js"></script>
    <script type="text/javascript" src="js/voltar.js"></script>

    <title>Login Churras</title>
</head>

<?php
if(isset($_SESSION['idusuario'])){
    ?>

    <div class="text-center">
        <h1 class="alert-danger" style="margin-left: 100px;margin-right: 100px;">Você ja está logado deseja deslogar?</h1>
        <button class="btn btn-secundary dimensoesBotoes" data-toggle="modal" data-target="#modalLogout"   >Logout</button>
        <button class="btn btn-primary dimensoesBotoes"  onclick="voltaPagina()" >Voltar</button></a>
    </div>
    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="labelModalLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelModalLogout">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Sair">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="fimSessao.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


<?php }
else{
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="registro-form-link">Cadastro</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--formulario de login-->
                            <form id="login-form" action="processaLogin.php" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" id="password" tabindex="2" class="form-control" placeholder="Senha" required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="lembrarDeMim" id="lembrarDeMim">
                                    <label for="lembrarDeMim">Lembrar de mim</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit"  tabindex="4" class="form-control btn btn-login" value="Entrar">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="#" tabindex="5" class="forgot-password">Esqueceu sua senha?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- formulario de cadastro do cliente-->
                            <form id="registro-form" action="processaCadastro.php" name="form_cadastro" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="sobrenome" id="sobrenome" tabindex="2" class="form-control" placeholder="Sobrenome" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="endereco" id="endereco" tabindex="4" class="form-control" placeholder="Endereço" required>
                                </div>

                                <div class="form-group">
                                    <input type="number" name="ddd" id="ddd" tabindex="5" class="form-control" placeholder="ddd"   required>
                                </div>

                                <div class="form-group">
                                    <input type="number" name="telefone" id="telefone" tabindex="6" class="form-control" placeholder="Telefone" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" id="senha" tabindex="7" class="form-control" placeholder="Senha"  required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirme_senha" id="confirme_senha"  tabindex="8" class="form-control" placeholder="Confirme a senha">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button type="submit" tabindex="9" class="form-control btn btn-register" onclick="validarSenha()">Registrar-se</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</html>
<?php }?>

