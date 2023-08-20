<?php
      require_once('../../Configuracao/Conexao.php');
      require_once('../../Model/TarefaModel.php');
      
      $json = file_get_contents('php://input');    
      $reqbody = json_decode($json);

      $idTarefa = $reqbody->idTarefa;

      $conexao = new Conexao();
      $db = $conexao->abrirConexao();
      $tarefaModel = new TarefaModel($db);

      $tarefaModel->idTarefa = $idTarefa;
      $retorno = $tarefaModel->excluirTarefa();

      echo json_encode($retorno);


?>