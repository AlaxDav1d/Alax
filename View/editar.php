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

      <h2 class="text-center mb-4">Editar cadastro</h2>
      <form class="mt-4">
        <input type="hidden" id="idTxt" value="<?php echo $id?>" />
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="nomeCompletoTxt">Nome completo</label>
              <input type="text" class="form-control bg-primary text-light" maxlength="50" id="nomeCompletoTxt" name="nomeCompletoTxt" placeholder="Nome completo" />
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="nomeCompletoTxt">Data Nascimento</label>
            <input type="text" class="form-control bg-primary text-light" maxlength="50" id="dataNascimentoTxt" name="dataNascimentoTxt" placeholder="Nome completo" />
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="emailTxt">Email</label>
              <input type="email" class="form-control bg-primary text-light" maxlength="50" id="emailTxt" name="emailTxt" placeholder="fulano@exemplo.com" />
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="confirmarEmailTxt">Confirmar email</label>
            <input type="email" class="form-control bg-primary text-light" maxlength="50" id="confirmarEmailTxt" name="confirmarEmailTxt" placeholder="fulano@exemplo.com" />
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="senhaTxt">Senha</label>
              <input type="password" class="form-control bg-primary text-light" maxlength="20" id="senhaTxt" name="senhaTxt" placeholder="Senha" />
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <label for="confirmarSenhaTxt">Confirmar senha</label>
            <input type="password" class="form-control bg-primary text-light" maxlength="20" id="confirmarSenhaTxt" name="confirmarSenhaTxt" placeholder="Confirmar senha" />
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label for="telefoneTxt">Telefone</label>
              <input type="text" class="form-control bg-primary text-light" maxlength="14" id="telefoneTxt" name="telefoneTxt" placeholder="(11)99999-9999" />
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
  async function carregarDados(id){
    const config = {
      method: 'post',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body:JSON.stringify({idUsuario: id})
    };
    
    const request = await fetch('../Controller/usuarios/listarUsuariospeloID.php',config);
    const response = await request.json();
    const dados = response.dados;

    $('#nomeCompletoTxt').val(dados[0].nome_completo);
    $('#emailTxt').val(dados[0].email);
    $('#telefoneTxt').val(dados[0].telefone);
    $('#senhaTxt').val(dados[0].senha);
    $('#dataNascimentoTxt').val(dados[0].data_nasc);
  }
    async function editarDados(id){
      const config = { 
      method: 'post',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body:JSON.stringify({
        nome_completo: nomeCompletoTxt,
        data_nasc: dataNascimentoTxt,
        email:emailTxt,
        confirmarEmail:confirmarEmailTxt,
        senha:senhaTxt,
        confirmarSenha:confirmarSenhaTxt,
        telefone:telefoneTxt,
        id: idJs
      })
      }
    const request = await fetch('../Controller/usuarios/atualizarUsuario.php',config);
    const response = await request.json();
    if(emailTxt == confirmarEmailTxt && senhaTxt == confirmarSenhaTxt){
      if(response.status === 1){
        Swal.fire('Atenção!','dados atualizados com sucesso','sucess').then(res=>window.location.href = 'usuarios.php');
      }else{
        Swal.fire('Atenção!','Verifique as informações no form','error');
        //Swal é uma abreviação para sweetalert
      }
    }else{    
      Swal.fire('Atenção!','A Senha ou o Email não coincidem','error');
    }
    }
  $(document).ready(async function(){await carregarDados(<?php echo $id; ?>);
    $('#editarBtn').on('click',async function(e){ await editarDados(e); });

    $('#cancelarBtn').on('click',function(){ window.location.href = 'usuarios.php'; });
  });
</script>


</html>