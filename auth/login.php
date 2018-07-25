<!DOCTYPE html>
<html>
<head>
<title> </title>
<link href="../Cliente/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- Custom fonts for this template-->
<link href="../Admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
</head>
<body style="background-image: url('../Cliente/img-fixa/background.jpg');background-repeat: no-repeat;background-position: center;">
<div class="modal-dialog" style="opacity: 0.92;">
  <br><br><br><br>
  <div class="modal-content login-box ">
    <div class="modal-header">

      <h1 class="text-center">Bem Vindo...</h1>
    </div>
    <div class="modal-body">
     <div class="form-group">
       <input type="text" id="email" class="form-control input-lg" placeholder="E-mail"/>
     </div>

     <div class="form-group">
       <input type="password"  id="senha" class="form-control input-lg" placeholder="Password"/>
     </div>

     <div class="form-group">
       <input type="submit" class="btn btn-block btn-lg btn-primary" id="logar" value="Login"/>
       <br>
       <div class="text-center">
        <span ><a href="register.php">Cadastrar</a></span><br>
        <span><a href="../">Voltar ao Site</a></span>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

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
      url: '../motor/controller/login.php',
      data: {
       email : email,
       senha : senha
     },
     success: function(data) {
      obj = JSON.parse(data);
      console.log(obj.res);

      if(obj.res=='true') {

        if (obj.tipo=='admin') {
          toastr.info('Redirecionando...<br>&nbsp', 'Login efetuado com sucesso!', {positionClass: 'toast-top-full-width',
            progressBar: true,
            timeOut: "2500",});

          setTimeout(function() {
            document.location.href = '../Admin';
          }, 2600);

        }else if(obj.tipo=='cli'){

          toastr.info('Redirecionando...<br>&nbsp', 'Login efetuado com sucesso!', {positionClass: 'toast-top-full-width',
            progressBar: true,
            timeOut: "2500",});

          setTimeout(function() {
            document.location.href = '../Cliente';
          }, 2600);
        }

      } else if(obj.res == 'wrong_user_found') {
        swal("Atenção!", "Usuário não encontrado!", "error");
      } else if(obj.res == 'wrong_password') {
        swal("Atenção!", "Senha incorreta", "error");
      }else {
        swal("Atenção!", "Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes!", "error");
      }
    },
    type: 'POST'
  });     
  }
});


});

</script>          