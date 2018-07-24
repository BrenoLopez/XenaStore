<!DOCTYPE html>
<html>
<head>
  <title> </title>
  <link href="../Cliente/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../Admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
</head>
<body>
    <div class="modal-dialog">
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
          console.log(data);
          if(data === 'true') {
        
            toastr.info('Redirecionando...<br>&nbsp', 'Login efetuado com sucesso!', {positionClass: 'toast-top-full-width',
                progressBar: true,
                timeOut: "2500",});

            setTimeout(function() {
              document.location.href = '../';
          }, 2600);
        } else if(data === 'no_user_found') {
            swal("Atenção!", "Usuário não encontrado!", "error");
        } else if(data === 'wrong_password') {
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