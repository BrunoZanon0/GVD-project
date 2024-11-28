<?php 

class UserModel{
    public $table;
    public function __construct(){
        $this->table = 'table';
    }

    public function cadastrando_novo_usuario($lista_array){
        
        try {
            session_start();

            $email = $lista_array['email'];

            if (isset($_SESSION) && !empty($_SESSION)) {
                foreach ($_SESSION as $key => $valores) {
                    if (isset($valores['email']) && $valores['email'] == $email) {
                        throw new Exception('Email já existente!');
                    }
                }
            }

            if (isset($_SESSION[$email]) && $_SESSION[$email]) {
                throw new Exception('Email já existente');  // Simulando se já encontrar algo no banco;
            }

            $_SESSION['emails'][] = [
                $lista_array
            ];

            $retorno = [
                'status' => 201,
                'msg'    => 'Cadastrado com sucesso'
            ];
            
        } catch (Exception $e) {

            $retorno = [
                'status' => 401,
                'msg' => $e->getMessage()
            ];
        }finally{
            return $retorno;
        }
    }

    public function login_user_to_sistem($lista_array){

        try {
            session_start();

            $email          = $lista_array['email'];
            $senha          = $lista_array['senha'];
            $valida_email   = '';

            if (isset($_SESSION['emails']) && !empty($_SESSION['emails'])) {
                foreach ($_SESSION['emails'] as $valores => $key) { // TIVE QUE USAR 2 FOREACH PARA ARMAZENAR EM LOCAIS DIFERENTES
                    foreach($key as $dados){
                        if($dados['email'] == $email){
                            if(password_verify($senha,$dados['senha'])){
                                $valida_email = true;

                                $_SESSION['login'] = [
                                    'email' => $dados['email'],
                                    'nome' => $dados['nome'],
                                    'idade' => $dados['idade'],
                                ];

                                // header("location: ../pages/view_dashboard.php"); Seria movido para a pagina se fosse totalmente back pelo banco
                                // exit();

                            }
                        }
                    }
                }
            }

            if(!$valida_email) throw new Exception('Usuário ou senha inválida!');

            $retorno = [
                'status' => 200,
                'msg'    => 'Apto a logar'
            ];
            
        } catch (Exception $e) {

            $retorno = [
                'status' => 401,
                'msg' => $e->getMessage()
            ];
        }finally{
            return $retorno;
        }

    }
}
?>