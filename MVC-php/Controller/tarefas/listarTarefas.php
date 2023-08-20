<?php 

require_once('../../Configuracao/Conexao.php');
require_once('../../Model/TarefaModel.php');

$conexao = new Conexao();
$db = $conexao->abrirConexao();

$tarefaModel = new TarefaModel($db);
$dados = $tarefaModel->lerTarefas();

echo json_encode($dados);
?>   