<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio PHP</title>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: rgb(48, 17, 149);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 40vh;
            width: 40vh;
            border-radius: 10px;
            color: #fff;
            text-transform: capitalize;
        }

        input{
            padding: 5px;
            margin: 15px;
            border-radius: 10px;
            height: 5vh;
            width: 25vh;
            font-size: 15px;
            color: rgb(51, 1, 97);
            border: none;
        }
        input:focus{
            border: double red;
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
    <form>
        <h1>formulario aula PHP</h1>
        <input type="text" name="login" placeholder="insira seu login" id="loginTxt">
        <input type="password" name="senha" placeholder="insira sua senha" id="senhaTxt">
        <input type="button" id="loginBtn" value='acessar'>
    </form>


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