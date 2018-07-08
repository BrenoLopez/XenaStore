function validarSenha(){
    senha = document.form_cadastro.senha.value;
    confirme_senha = document.form_cadastro.confirme_senha.value;

    if (senha != confirme_senha){
        alert("Senhas diferentes, digite a mesma combinação!");
        location.href='../login.php/#';
            }
        else
        document.getElementById('login-form').action = "processaLogin.php";
}