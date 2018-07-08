<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php
include ("php/conexao.php");
include("funcoes.php");

$nome= $_POST['nome'];
$sobrenome= $_POST['sobrenome'];
$email= $_POST['email'];
$endereco= $_POST['endereco'];
$ddd=$_POST['ddd'];
$telefone= $_POST['telefone'];
$senha= $_POST['senha'];

    $usuario = $conectar->query("select email from usuarios ");
    $usuario->execute();
    $consulta = $usuario->fetch(PDO::FETCH_ASSOC);
if($email == $consulta['email']){
    ?>
    <script type="text/javascript">
    alert("Usuário já cadastrado!!Tente novamente com outro Email!");
    location.href="login.php";
    </script>
        <?php
    }
    else{
   cadastraCliente($conectar,$nome,$sobrenome,$email,$endereco,$ddd,$telefone,$senha);?>
<script type="text/javascript">
    location.href="login.php";
    alert("BEM VINDO AO CHURRAS!!");
    </script>
<?php }?>

