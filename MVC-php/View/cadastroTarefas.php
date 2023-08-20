
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
                              <input type="button" value="Cadastrar" style="background-color: green;">      
                        </div>      
                  </form>
            </div>
      </div>
</body>
</html>

