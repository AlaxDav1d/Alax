<?php
    require_once('../../Configuracao/Conexao.php');
    require_once('../../Model/UsuarioModel.php');
    //entrada
    $json = file_get_contents('php://input');
    $reqbody = json_decode($json);
    
    $nomeComp = $reqbody->nome;
    $dataNasc = $reqbody->dataNasc;
    $email = $reqbody->email;
    $senha = $reqbody->senha;
    $telefone = $reqbody->telefone;

    //processamento
    $conexao = new Conexao();
    $db = $conexao->abrirConexao();
    $usuarioModel = new UsuarioModel($db);

    $usuarioModel->nomeCompletoModel = $nomeComp;
    $usuarioModel->dataNascimentoModel = $dataNasc;
    $usuarioModel->emailModel = $email;
    $usuarioModel->senhaModel = $senha;
    $usuarioModel->telefoneModel = $telefone;

    $retorno = $usuarioModel->cadastrar();    
    //saída
    echo json_encode($retorno);

?>