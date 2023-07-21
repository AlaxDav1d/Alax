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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .content {
      height: 78vh;
      width: 85vw;
      overflow-y: auto;
      padding: 5vh 1vw;
    }
  </style>
</head>

<body>
  <div class="container-fluid d-flex align-items-center justify-content-center bg-primary">
    <div class="content bg-light">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#subnav">
          <span class="navbar-toggler-icon"></span>      
        </button>
        <div class="collapse navbar-collapse" id="subnav">
          <ul class="navbar-nav">
            <a class="nav-link active" href="usuarios.php">
              Usuarios
            </a>
            <a class="nav-link" href="tarefas.php">
              Tarefas
            </a>
            <a class="nav-link" href="../index.php">
              Sair
            </a>
          </ul>
        </div>
      </nav>

      <h1>Boas vindas ao sistema!</h1>
      <a href="../cadastro.php" class="btn btn-success text-light">
        Novo usuario
      </a>

      <div class="table-responsive">
        <table class="table table-condensed table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Idade</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody id="conteudo-usuario"></tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="../js/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
async function carregarDados(){
  const request = await fetch('../controller/usuarios/listarUsuarios.php',{method:'get'});
  const response = await request.json();
  const conteudo = document.getElementById('conteudo-usuario');

  for(const item of response.dados){
    conteudo.innerHTML += 
      `<tr class = "linha-tabela" style="border: 5px solid red">
        <td>${item.id}</td> 
        <td>${item.nome_completo}</td> 
        <td>${item.data_nasc}</td> 
        <td>${item.email}</td> 
        <td>${item.telefone}</td>
        <td>
          <div class="row">
            <button class="btn-warning"
                 onclick="editarUsuario(${item.id})">
              <i class="fas fa-pencil"></i>
            </button>
            <button class="btn-danger"
                onclick="deletarUsuario(${item.id})">
                <i class="fas fa-trash"></i>
            </button>
            </div>
        </td>
      </tr>`;
  }
}
function editarUsuario(id){
  window.location.href = `editar.php?id=${id}`;
}
function deletarUsuario(id){
  Swal.fire({
    title: 'Atenção!',
    text: 'Tem certeza que deseja remover esse usuario?',
    icon: 'question',
    showConfirmButton: true,
    showCancelButton: true,
  }).then(async function(res){
   
    if(res.isConfirmed){
      const config = {
        method:'post',
        body:JSON.stringify({
        idUsuario: id
        })
      };
      const request = await fetch('../controller/usuarios/deletarUsuario.php', config);
      const response = await request.json();
      if(response.status === 1) {
        Swal.fire('Atenção!','Usuario removido com sucesso', 'sucess');
      }else{
        Swal.fire('Atenção!','Erro ao remover usuario.','error');
      }
    }
  });
}

$(document).ready(function() {
  carregarDados();
})
</script>

</html>