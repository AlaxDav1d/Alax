<?php
    class UsuarioModel{
        public $db = null;
        public  $id = 0;
        public $nomeCompletoModel = null;
        public $dataNascimentoModel = null;
        public $emailModel = null;
        public $senhaModel = null;
        public $telefoneModel = null;
        
        public function __construct($conexaoBanco){
            $this ->db = $conexaoBanco;
        }
        public function logar() {

            $retorno = ['status' => 0, 'dados' => null];
    
            try {
                $stmt = $this->db->prepare('
                SELECT id, email FROM usuarios
                WHERE email = :email
                AND senha = :senha
                LIMIT 1
                
                ');
                $stmt->bindValue(':email', $this->emailModel);
                $stmt->bindValue(':senha', $this->senhaModel);
                $stmt->execute();
                $dado = $stmt->fetch()
                ;
    
                if ($dado['id'] && $dado['id'] > 0) {
                    $retorno['status'] = 1;
                    $retorno['dados'] = $dado;
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dado['id'];
                    $_SESSION['usuario'] = $dado['email'];
                }
            }
            catch(PDOException $ex) {
                echo 'Erro ao logar: '.$ex->getMessage();
            }
            return $retorno;
        }
        public function lerTodos(){
            $retorno = ['status' => 0,'dados' => null];
            try{
                $query = $this->db->query('SELECT * FROM usuarios');
                $dados = $query->fetchAll();
                $retorno['status'] = 1;
                $retorno['dados'] = $dados;
            }
            catch(PDOException $e){
                echo 'erro ao listar todos os usuarios: '.$e->getMessage();
            }
            return $retorno;
        }
        public function deletar(){
            $retorno = ['status' => 0,'dados' => null];
            try{
                $stmt = $this->db->prepare('DELETE FROM usuarios WHERE id = :id ');
                $stmt->bindValue(':id', $this->id);
                $stmt->execute();
                $retorno['status'] = 1;
            }
            catch(PDOException $e){
                echo 'Erro ao deletar usuario: '.$e->getMessage();
            }
            return $retorno;
        }
        public function listarPeloID(){
            $retorno = ['status' => 0,'dados' => null];
            try{
                $query = $this->db->prepare('
                SELECT  * FROM usuarios 
                WHERE id = :id');
                $query->bindValue(':id', $this->id);

                $query->execute();
                $dados = $query->fetchAll();
                
                $retorno['status'] = 1;
                $retorno['dados'] = $dados;
            }
            catch(PDOException $e){
                echo 'erro ao listar usuario pelo ID: '.$e->getMessage();
            }
            return $retorno;
        }
        public function atualizar(){
            $retorno = ['status' => 0,'dados' => null];
            try{
                $query = $this->db->prepare(' UPDATE usuarios SET 
                    nome_completo = :nome, 
                    email = :email , 
                    data_nasc = :dataNasc, 
                    senha = :senha,
                    telefone = :telefone 
                    WHERE id = :id');
                
                $query->bindValue(':id', $this->id);
                $query->bindValue(':nome',$this->nomeCompletoModel); 
                $query->bindValue(':email',$this->emailModel);
                $query->bindValue(':dataNasc',$this->dataNascimentoModel);
                $query->bindValue(':senha',$this->senhaModel);
                $query->bindValue(':telefone',$this->telefoneModel);

                $query->execute();
                $dados = $query->fetchAll();
            
                $retorno['status'] = 1;
                $retorno['dados'] = $dados;
            }
            catch(PDOException $e){
                echo 'erro ao atualizar usuario'.$e->getMessage();
            }
            return $retorno;
        }
        public function cadastrar(){
            $retorno = ['status' => 0,'dados' => null];
            try{
                $query = $this->db->prepare(' 
                INSERT INTO usuarios(nome_completo,data_nasc,email,senha,telefone) 
                VALUES (:nome,:dataNasc,:email,:senha,:telefone)');

                $query->bindValue(':nome',$this->nomeCompletoModel);
                $query->bindValue(':dataNasc',$this->dataNascimentoModel);
                $query->bindValue(':email',$this->emailModel);
                $query->bindValue('senha',$this->senhaModel);
                $query->bindValue('telefone',$this->telefoneModel);
                $query->execute();
                $dado = $query->fetch();
          
                $retorno['status'] = 1;
                $retorno['dados'] = $dado;
        
            }
            catch(PDOException $e){
                echo 'erro ao cadastrar usuario Model'.$e->getMessage();
            }
            return $retorno;
        }
    }
