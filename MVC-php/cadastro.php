
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro Usuario</title>
        <style>

            @keyframes animacao{
                0%{ 
                    transform: translateY(-6vh);
                    background-color: #3a4fb8;

                }                
                100%{ 
                    transform: translateY(100vh);
                    background-color: #051150;
                    height: 10px;
                }
                                    
            }
            @keyframes rodar{
                0%{
                    transform: rotate(180deg);

                }
                100%{
                    transform: rotate(360deg);
                }
            }
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            .tudo{
                height: 100vh;
                background-color: #051150; 
                overflow: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 5vh;
            }
            form{
                display: flex;
                flex-direction: column;
                gap: 15px;
                height: 80vh;
                width: 60vh;
                color: aliceblue;
                background-color: #121e5c;
                border: double black;
                border-radius: 30px;
                padding: 20px;
                transition: 1s;
                box-shadow: -5px -10px 10px black;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                /*fazer uma animação com box shadow rodando os quatro cantos*/
            }
            form:hover{
                background-color: #051150;
            }
            input{
                font-size: 15px;
                padding: 10px;
                border: none;
                border-radius: 5px;
                transition: 600ms;       
            }
            input:focus{
                transform: scale(98%);
            }
            button{
                background-color: rgb(255, 255, 255);
                padding: 10px;
                transition: 600ms;
                margin-top: 10px;
                width: 200px;
            }
            form button:hover{
                background-color:#051150;
                border-radius: 20px;
                border: 5px black dotted;
                color: #fff;
            }
            form button:focus{
                background-color:#051150;
                border-radius: 20px;
                border: 5px black dotted;
                color: #fff;
            }
            header{
                background-color: #041a85;
                width: 100%;
                height: 10vh;
                display: flex;
                align-items: center;
                padding-left: 20px;
                color: #fff;
                font-family: Georgia, 'Times New Roman', Times, serif;
                transition: 600ms;
            }
            header:hover{
                background-color: #051150;
            }
            .ponto{
                background-color: #fff;
                width: 2px;
                margin: 10px;
                height: 2px;
                border-radius: 50px;
                position: relative;
                animation: animacao calc(80s/ (var(--te)) ) infinite;
            }
            .flex{
                display: flex;   
            }
            .pontos{
                display: flex;
                animation-name: rodar;
                animation-duration: 25s;
                animation-direction: reverse;
                animation-iteration-count: infinite;
                overflow: hidden;
                margin: 45px;
            }
            .pontos1{
                display: flex;
                animation-name: rodar;
                animation-duration:25s;
                animation-direction: normal;
                animation-iteration-count: infinite;
                overflow: hidden;
                margin: 20px;
            }

        </style>
    </head>
    <body>
        <div class="tudo">

            <header>
                <h2>Bem Vindo ao nosso Sistema!!</h2>
            </header>

            <div class="flex">

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

                    <button id="submitBtn">Enviar</button>
                </form>

            </div>
        </div>
       
        
        
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
