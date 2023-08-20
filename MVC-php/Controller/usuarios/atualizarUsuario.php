<?php 

require_once('../../Configuracao/Conexao.php');
require_once('../../Model/UsuarioModel.php');
//entrada
$json = file_get_contents('php://input');    
$reqbody = json_decode($json);

$id = $reqbody->id;
$nomeCompleto = $reqbody->nome_completo;
$dataNascimento = $reqbody->data_nasc;
$email = $reqbody->email;
$telefone = $reqbody->telefone;
$senha = $reqbody->senha;

//processamento
$conexao = new Conexao();
$db = $conexao->abrirConexao();
$usuarioModel = new UsuarioModel($db);

$usuarioModel->id = $id;
$usuarioModel->nomeCompletoModel = $nomeCompleto;
$usuarioModel->dataNascimentoModel = $dataNascimento;
$usuarioModel->emailModel = $email;
$usuarioModel->telefoneModel = $telefone;
$usuarioModel->senhaModel = $senha;

$dados = $usuarioModel->atualizar();
//saida
echo json_encode($dados);
?>   