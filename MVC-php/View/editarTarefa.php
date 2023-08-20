<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html5>
<html>

<head>
  <title>Pagina</title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css/sweetalert2.min.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
  <div class="container-fluid d-flex align-items-center justify-content-center bg-primary">
    <div class="content bg-light">

      <h2 class="text-center mb-4">Editar Tarefa</h2>
      <form class="mt-4">
        <input type="hidden" id="idTxt" value="<?php echo $id?>" />
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="nomeCompletoTxt">Titulo</label>
              <input type="text" class="form-control bg-primary text-light" maxlength="50" id="tituloTxt" name="tituloTxt" placeholder="Nome completo" />
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="nomeCompletoTxt">Descricao</label>
            <input type="text" class="form-control bg-primary text-light" maxlength="50" id="descricaoTxt" name="descricaoTxt" placeholder="Nome completo" />
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="inicioTxt">Inicio</label>
              <input type="email" class="form-control bg-primary text-light" maxlength="50" id="inicioTxt" name="inicioTxt" placeholder="Inicio" />
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="confirmarinicioTxt">Término</label>
            <input type="email" class="form-control bg-primary text-light" maxlength="50" id="terminoTxt" name="terminoTxt" placeholder="Termino" />
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="senhaTxt">ID Usuario</label>
              <input type="text" class="form-control bg-primary text-light" maxlength="20" id="idUsuarioTxt" name="senhaTxt" placeholder="Senha" />
            </div>
          </div>
     
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <button id="cancelarBtn"
                      type="button"
                      class="btn btn-danger btn-block">
                CANCELAR
              </button>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <button id="editarBtn" 
                    type="button"
                    class="btn btn-warning btn-block">
              EDITAR
            </button>
          </div>
        </div>

    </div>
    </form>
  </div>
</body>

<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="../js/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
      async function carregarTarefa(id){
        const config = {
          method: 'post',
          headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body:JSON.stringify(
            {idTarefa: id}
            )
        };
        
        const request = await fetch('../Controller/tarefas/listarTarefasPeloId.php',config);
        const response = await request.json();
        const dados = response.dados;
    
        $('#tituloTxt').val(dados[0].titulo);
        $('#descricaoTxt').val(dados[0].descricao);
        $('#inicioTxt').val(dados[0].inicio);
        $('#terminoTxt').val(dados[0].termino);
        $('#idUsuarioTxt').val(dados[0].idUsuario);
      }
        async function editarTarefa(id){
            const tituloTxt = $('#tituloTxt').val();
            const descricaoTxt = $('#descricaoTxt').val();
            const inicioTxt = $('#inicioTxt').val();
            const terminoTxt = $('#terminoTxt').val();
            const idTxt = $('#idTxt').val();
            const config = { 
          method: 'post',
          headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body:JSON.stringify({
            tituloTxt: tituloTxt,
            descricaoTxt: descricaoTxt,
            inicioTxt:inicioTxt,
            terminoTxt:terminoTxt,
            //adicionar ID do usuario aqui depois 
            id: idTxt
          })
          }
        const request = await fetch('../Controller/tarefas/atualizarTarefa.php',config);
        const response = await request.json();
          if(response.status === 1){
            Swal.fire('Atenção!','Tarefas atualizadas com sucesso','sucess').then(res=>window.location.href = 'tarefas.php');
          }else{
            Swal.fire('Atenção!','Verifique as informações no form','error');
            //Swal é uma abreviação para sweetalert
          }
        }
      $(document).ready(async function(){await carregarTarefa(<?php echo $id; ?>);
        $('#editarBtn').on('click',async function(e){ await editarTarefa(e); });
      
        $('#cancelarBtn').on('click',function(){ window.location.href = 'tarefas.php'; });
      });
</script>

</html>