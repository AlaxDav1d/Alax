<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio PHP</title>

    <style>
        @keyframes grad{
            0%{
                background-color: black;
            }
            50%{
                background-color: rebeccapurple;
            }
            100%{
                background-color: rgb(3, 3, 95);
            }
        }
        *{
            padding: 0;
            margin: 0;
        }
        .tudo{
            background-color: black;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: grad 5s linear infinite alternate-reverse;
        }
        form {
            background-color: rgb(48, 17, 149);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 70vh;
            width: 60vh;
            border-radius: 10px;
            color: #fff;
            gap: 50px;
            text-transform: capitalize;
            position: absolute;
            padding: 20px;
        }

        input{
            padding: 5px;
            border-radius: 10px;
            height: 5vh;
            width: 80%;
            position: relative;
            font-size: 15px;
            color: rgb(185, 138, 230);
            border: none;
        }
        input:focus{
            background-color: aliceblue;
        }
        ::placeholder {
            font-size: 15px;
            text-transform: capitalize;
            color: blueviolet;
        }

        #loginBtn{
            background-color: rgb(219, 212, 244);
            padding: 10px;
            width: 50%;
            border-radius: 10px;
            margin: 10px;
            text-transform: capitalize;
            transition: 400ms;
        }

        #loginBtn:hover {       
            color: aliceblue;
            border: double red;
            transition: 400ms;        
        }
    </style>
</head>

<body>
    <div class="tudo">
        <form>
            <h1>formulario aula PHP</h1>
            <input type="text" name="login" placeholder="insira seu login" id="loginTxt">
            <input type="password" name="senha" placeholder="insira sua senha" id="senhaTxt">
            <input type="button" id="loginBtn" value='acessar'>
        </form>
    </div>



</body>

<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="js/sweetalert2.all.min.js" type="text/javascript"></script>

<script type="text/javascript" charset='utf-8'>

    $(document).ready(function () {
        $("#loginBtn").on("click", async function (e) {
            e.preventDefault();
           
            const loginJs = $('#loginTxt').val();
            const senhaJs = $('#senhaTxt').val();
            // criação da variavel config
            
            const config = {
                method: "post",
                headers:{
                    'Accept': 'application/json',
                    'Content-Type' : 'application/json'
                },
                body: JSON.stringify({
                    login: loginJs,
                    senha: senhaJs
                })
            }
            const request = await fetch('Controller/Login/logar.php',config)
            
            const response = await request.json();

      
      if (response.status === 1) {
        window.location.href = 'view/usuarios.php';
      }
      else {
        Swal.fire({
          title: 'Atenção!', 
          text: 'Login ou senha incorretos',
          icon: 'error'
        });
      }
    });
  });
</script>
</body>

</html>
