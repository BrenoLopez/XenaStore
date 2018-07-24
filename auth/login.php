<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="../Cliente/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../Admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../Admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email </label>
            <input class="form-control" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input class="form-control" id="senha" type="senha" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Lembrar Senha</label>
            </div>
          </div>
           <input type="submit" class="btn btn-block btn-lg btn-primary" id="logar" value="Login"/>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Cadastrar Conta</a>
          <a class="d-block small" href="forgot-password.html">Esqueci minha Senha?</a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
 <!-- Bootstrap core JavaScript-->
<script src="../Cliente/js/jquery.js"></script>
<script src="../Cliente/js/sweetalert.js"></script>
<script src="../Cliente/js/toastr.min.js"></script>

<script type="text/javascript">




$(document).ready(function(e) {
  $('#logar').click(function(e) {
    var email = $('#email').val();
    var senha = $('#senha').val();

      
    if( !email || !senha ) {
     swal("Atenção!", "Todos os campos devem ser preenchidos!", "info");
   } else {
     
      $.ajax({
        url: '../engine/controllers/login.php',
          data: {
             email : email,
             senha : senha
         },
         success: function(data) {
          console.log(data);
          if(data === 'true') {
        
            
            toastr.info('Redirecionando...<br>&nbsp', 'Login efetuado com sucesso!', {positionClass: 'toast-top-full-width',
                progressBar: true,
                timeOut: "2500",});

            setTimeout(function() {
              document.location.href = '../index.php';
          }, 2600);
        } else if(data === 'no_user_found') {
            swal("Atenção!", "Usuário não encontrado!", "error");
        } else if(data === 'wrong_password') {
            swal("Atenção!", "Senha incorreta", "error");
        } else {
            swal("Atenção!", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!", "error");
        }
    },
    type: 'POST'
});     
   }
 });


});


</script>    
