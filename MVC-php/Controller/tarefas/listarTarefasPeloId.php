<?php
    require_once('../../Configuracao/Conexao.php');
    require_once('../../Model/TarefaModel.php');
    //entrada
    $json = file_get_contents('php://input');
    $reqbody = json_decode($json);
    $id = $reqbody->idTarefa;
    //processamento
    $conexao = new Conexao();
    $db = $conexao->abrirConexao();
    $tarefaModel = new TarefaModel($db);
    $tarefaModel->idTarefa = $id;
    $retorno = $tarefaModel->listarTarefaPeloID();
    //saida
    echo json_encode($retorno);
    

?>