<?php
    require_once('../../Configuracao/Conexao.php');
    require_once('../../Model/TarefaModel.php');
    //entrada
    $json = file_get_contents('php://input');    
    $reqbody = json_decode($json);

    $idTarefa = $reqbody->id;
    $titulo = $reqbody->tituloTxt;
    $descricao = $reqbody->descricaoTxt;
    $inicio = $reqbody->inicioTxt;
    $termino = $reqbody->terminoTxt;
    //adicionar ID do Usuario aqui depois

    $conexao = new Conexao();
    $db = $conexao->abrirConexao();
    $tarefaModel = new TarefaModel($db);

      $tarefaModel->idTarefa = $idTarefa;
      $tarefaModel->titulo=$titulo;
      $tarefaModel->desc=$descricao;
      $tarefaModel->inicio=$inicio;
      $tarefaModel->termino=$termino;

      $dados = $tarefaModel->atualizarTarefa();

      echo json_encode($dados);
?>