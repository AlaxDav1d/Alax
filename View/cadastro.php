
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

            <button id="submitBtn" onclick="cadastrarUsuario()"  ></button>
        </form>
        <script type="text/javascript">
            async function cadastrarUsuario(){
                    const nomeCompletoTxt = $('#nomeCompletoTxt').val();
                    const dataNascimentoTxt = $('#dataNascTxt').val();
                    const emailTxt = $('#emailTxt').val();
                    const senhaTxt = $('#senhaTxt').val();
                    const telefoneTxt = $('#telefoneTxt').val();
                  
                    const config ={
                        method:'post',
                        headers:{
                                'Accept': 'application/json',
                                'Content-Type' : 'application/json'
                        },
                        body:JSON.stringify({
                            login: nome,
                            dataNasc: dataNasc,
                            email: email,
                            senha: senha,
                            telefone: telefone
                        })
                    }
                   
                    const request = await fetch('../Controller/usuarios/cadastrarUsuario.php');
                
                    const response = await request.json();
                
                    if(response.status == 1){
                        window.location.href = '/Usuarios.php';
                    }else{
                        alert('erro ao cadastrar usuario')
                    }               
            }
            
        </script>
    </body>
</html>