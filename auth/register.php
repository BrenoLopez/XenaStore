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
        <form action="../motor/controller/user.php" method="POST" id="target"> 
       <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputName">Primeiro Nome</label>
            <input class="form-control" id="first_name" name="first_name" type="text" aria-describedby="nameHelp" placeholder="Digite seu nome">
          </div>
          <div class="col-md-4">
            <label for="exampleInputLastName">Sobrenome</label>
            <input class="form-control" id="last_name" name="last_name" type="text" aria-describedby="nameHelp" placeholder="Sobrenome">
          </div>
          <div class="col-md-4">
            <label for="exampleInputLastName">Telefone</label>
            <input class="form-control" id="telefone" name="telefone" type="text" aria-describedby="nameHelp" placeholder="Sobrenome">
          </div>
        </div>
      </div>
      <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Email</label>
                <input class="form-control" id="email" name="email" type="text" aria-describedby="nameHelp" placeholder="Digite seu email">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">CPF</label>
                <input class="form-control" id="cpf" name="cpf" type="text" aria-describedby="nameHelp" placeholder="cpf">
              </div>
            </div>
          </div>


      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for=""><span class="req"></span> Estado </label>
            <select class="form-control" id="estado" name="estado">
              <option value="" selected disabled>Selecione...</option>
              <option value="AC">Acre</option>
              <option value="AL">Alagoas</option>
              <option value="AP">Amapá</option>
              <option value="AM">Amazonas</option>
              <option value="BA">Bahia</option>
              <option value="CE">Ceará</option>
              <option value="DF">Distrito Federal</option>
              <option value="ES">Espírito Santo</option>
              <option value="GO">Goiás</option>
              <option value="MA">Maranhão</option>
              <option value="MT">Mato Grosso</option>
              <option value="MS">Mato Grosso do Sul</option>
              <option value="MG">Minas Gerais</option>
              <option value="PA">Pará</option>
              <option value="PB">Paraíba</option>
              <option value="PR">Paraná</option>
              <option value="PE">Pernambuco</option>
              <option value="PI">Piauí</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="RN">Rio Grande do Norte</option>
              <option value="RS">Rio Grande do Sul</option>
              <option value="RO">Rondônia</option>
              <option value="RR">Roraima</option>
              <option value="SC">Santa Catarina</option>
              <option value="SP">São Paulo</option>
              <option value="SE">Sergipe</option>
              <option value="TO">Tocantins</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="exampleInputLastName">Cidade</label>
            <input class="form-control" id="cidade" name="cidade" type="text" aria-describedby="nameHelp" placeholder="Cidade">
          </div>
          <div class="col-md-4">
            <label for="exampleInputLastName">Cep</label>
            <input class="form-control" id="cep" name="cep" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4">
            <label for="exampleInputPassword1">Rua</label>
            <input class="form-control" id="rua" name="rua" type="text" placeholder="Rua">
          </div>
          <div class="col-md-4">
            <label for="exampleConfirmPassword">Bairro</label>
            <input class="form-control" id="bairro" name="rua" type="text" placeholder="Bairro">
          </div>
          <div class="col-md-4">
            <label for="exampleConfirmPassword">Numero</label>
            <input class="form-control" id="numero" name="numero" type="number" placeholder=" numero casa">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Senha">
          </div>
          <div class="col-md-6">
            <label for="exampleConfirmPassword">Confirm password</label>
            <input class="form-control" id="password_conf" name="password_conf" type="password" placeholder="Confirm Senha">
          </div>
          <input type="hidden" name="action" value="create">
          <input type="hidden" name="tipo" value="0">
        </div>
      </div>


</form>
      <div class="form-group">
       <input type="submit" class="btn btn-block btn-lg btn-primary" id="cadastrar" value="Cadastrar"/>
       <br>
       <div class="text-center">
        <span ><a href="login.php">Login</a></span><br>
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
    $('#cadastrar').click(function(e) {

      var firt_name= $('#firt_name').val();
      var last_name= $('#last_name').val();
      var telefone= $('#telefone').val();
      var email= $('#email').val();
      var cpf= $('#cpf').val();
      var estado= $('#estado').val();
      var cidade= $('#cidade').val();
      var rua= $('#rua').val();
      var bairro= $('#bairro').val();
      var numero= $('#numero').val();
      var password= $('#password').val();
      var password_conf= $('#password_conf').val();
      var cep= $('#cep').val();


      if(!first_name || !last_name || !telefone || !email || !cpf || !estado || !cidade || !rua || !bairro || !numero || !password || !cep ){

       swal("Atenção!", "Todos os campos devem ser preenchidos!", "info");
      }else if(password !=password_conf){
       swal("Atenção!", "Senhas digitadas diferentes", "erro");
      }else{ 
         $( "#target" ).submit();
      }

    });
  });  


</script>          