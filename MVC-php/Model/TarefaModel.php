<?php
    class TarefaModel{
      public $db = null;
      public $idTarefa = 0;
      public $titulo = null;
      public $desc = null;
      public $inicio = null;
      public $termino = null;

      public function __construct($conexaoBanco){
            $this ->db = $conexaoBanco;
        }
      public function lerTarefas(){
            $retorno =['status' => 0,'dados' => null];
            try{
                  $query = $this->db->query('SELECT * FROM tarefas');
                  $dados = $query->fetchAll();

                  $retorno['staus'] = 1;
                  $retorno['dados'] = $dados;

            }catch(PDOException $e){
                  echo 'erro ao listar tarefas'.$e->getMessage();
            }
            return $retorno;
      }
      public function listarTarefaPeloID(){
            $retorno =['status' => 0,'dados' => null];
            try{
                  $query = $this->db->prepare('SELECT * FROM tarefas WHERE id = :id');
                  $query->bindValue(':id',$this->idTarefa);
                  $query->execute();

                  $dados=$query->fetchAll();

                  $retorno['status'] =1;
                  $retorno['dados'] = $dados;

            }catch(PDOException $e){
                  echo 'erro ao listar tarefas pelo ID'.$e->getMessage();
            }
            return $retorno;
      }
      public function atualizarTarefa(){
            $retorno = ['status' => 0,'dados' => null];
            try{
                  $query = $this->db->prepare('UPDATE tarefas SET
                        titulo = :titulo,
                        descricao = :descricao,
                        inicio = :inicio,
                        termino = :termino
                        WHERE id = :id 
                        ');

                        $query->bindValue(':id',$this->idTarefa);
                        $query->bindValue(':titulo',$this->titulo);
                        $query->bindValue(':descricao',$this->desc);
                        $query->bindValue(':inicio',$this->inicio);
                        $query->bindValue(':termino',$this->termino);

                        $query->execute();
                        $dados = $query->fetchAll();

                        $retorno['status'] = 1;
                        $retorno['dados'] = $dados;
                  }catch(PDOException $e){
                        echo 'erro ao atualizar tarefas'.$e->getMessage();                  
                  }
                  return $retorno;
      }
      
    }
?>