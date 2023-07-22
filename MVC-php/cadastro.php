
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro Usuario</title>
    </head>
    <body>
        <form action="">
            <h2>Realize aqui o seu Cadastro</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nomeCompleto" id="nomeCompletoTxt" >

            <label for="data">Data de Nascimento</label>
            <input type="text" name="DataNascimento" id="dataNascTxt" >

            <label for="email">Email</label>
            <input type="email" name="email" id="emailTxt" >

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senhaTxt" >

            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefoneTxt">

            <button id="submitBtn"></button>
        </form>
    </body>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">

               $(document).ready(function (){
                $("#submitBtn").on("click", async function (e){
                    e.preventDefault();
                    const nomeCompleto = $('#nomeCompletoTxt').val();
                    const dataNascimento = $('#dataNascTxt').val();
                    const email = $('#emailTxt').val();
                    const senha = $('#senhaTxt').val();
                    const telefone = $('#telefoneTxt').val();
                    
                    const config ={
                        method:'post',
                        headers:{
                                'Accept': 'application/json',
                                'Content-Type' : 'application/json'
                        },
                        body:JSON.stringify({
                            nome: nomeCompleto,
                            dataNasc: dataNascimento,
                            email: email,
                            senha: senha,
                            telefone: telefone
                        })
                    }
                    
                    const request = await fetch('Controller/usuarios/cadastrarUsuario.php',config);
                    const response = await request.json();
                    alert('hello world');
                    if(response.status == 1){
                        window.location.href = 'view/Usuarios.php';
                    }else{
                        alert('erro ao cadastrar usuario');
                    }      
                });
            });
                         
                
                
        </script>
</html>