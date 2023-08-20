
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../View/css/cadastroTarefas.css">
      <title>Cadastrar Tarefas</title>
</head>
<body>
      <div class="all">
            <div class="branco">
                  <form action="">
                        <h2>Cadastre as Tarefas aqui</h2>
                        <div class="inputs">
                              <div class="labels">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" name="Titulo" id="tituloTxt" class="campoTxt" placeholder="Titulo">      
                              </div>
                              <div class="labels">
                                    <label for="descrição">Descrição</label>
                                    <input type="text" name="Descrição" id="descricaoTxt" class="campoTxt" placeholder="Descrição">      
                              </div>
                        </div>     
                        <div class="inputs">
                              <div class="labels">
                                    <label for="text">Início</label>
                                    <input type="text" name="HoraInicio" id="inicioTxt" class="campoTxt" placeholder="Hora de Inicio">
                              </div>
                              <div class="labels">
                                    <label for="Termino">Término</label>
                                    <input type="text" name="HoraTermino" id="terminoTxt" class="campoTxt" placeholder="Hora de Término">      
                              </div>      
                        </div>
                        <div class="inputs">
                              <div class="labels">
                                    <label for="IdUsuario">IdUsuario</label>
                                    <input type="number" name="IdUsuario" id="idUsuarioTxt" placeholder="Foreign Key" class="campoTxt" >
                             </div>
                              <div class="labels invisible">
                                    <label for="IdUsuario">IdUsuario</label>
                                    <input type="radio" name="IdUsuario" id="idUsuarioTxt" placeholder="Foreign Key" class="campoTxt"  >
                             </div>
                        </div>
                        <div class="inputs">
                              <a href="./Usuarios.php"><input type="button" value="Cancelar" style="background-color: red;" id="sairTxt" ></a>
                              <input type="button" value="Cadastrar" style="background-color: green;" id="enviar">      
                        </div>      
                  </form>
            </div>
      </div>
</body>

      <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
      <script src="../js/sweetalert2.all.min.js"></script>
      <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                  $('#enviar').on('click',async function(e){
                        e.preventDefault();

                        const titulo = $('#tituloTxt').val();
                        const desc = $('#descricaoTxt').val();
                        const inicio = $('#inicioTxt').val();
                        const termino = $('#terminoTxt').val();
                        const idUsuario = $('#idUsuarioTxt').val();

                        const config = {
                              method:'post',
                              headers:{
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json'
                              },
                              body:JSON.stringify({
                                    titulo:titulo,
                                    descricao:desc,
                                    inicio:inicio,
                                    termino:termino,
                                    idUsuario:idUsuario
                              })
                        }
                        const request =await fetch('../Controller/tarefas/cadastrarTarefa.php',config);
                        const response = await request.json();

                              if(response.status == 1){
                                    Swal.fire('Atenção!','Usuario cadastrado com sucesso','sucess').then(res=>window.location.href = '../view/Usuarios.php');''
                              }else{
                                    Swal.fire('erro ao cadastrar usuario');
                              }  
                  });
            });
      </script>
</html>