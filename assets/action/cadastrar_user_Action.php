<?php 

include_once __DIR__ . "/../model/userModel.php";

try {

    if(!isset($_POST['email']) || empty($_POST['email'])) throw new Exception('Email é obrigatório');
    if(!isset($_POST['senha']) || empty($_POST['senha'])) throw new Exception('Senha é obrigatório');
    if(!isset($_POST['nome']) || empty($_POST['nome'])) throw new Exception('Nome é obrigatório');
    if(!isset($_POST['idade']) || empty($_POST['idade'])) throw new Exception('Idade é obrigatório');

    $email  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $senha  = filter_var($_POST['senha'],FILTER_SANITIZE_STRING);
    $nome   = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
    $idade  = filter_var($_POST['idade'],FILTER_VALIDATE_INT);

    $senha_hash = password_hash($senha,PASSWORD_DEFAULT);

    ######### SIMULANDO UM BANCO DE DADOS SEJA PDO OU MYSQLI #######

    $lista_array = [
        'email'     => $email,
        'senha'     => $senha_hash,
        'nome'      => $nome,
        'idade'     => $idade,
    ];
    
    $userModel = new UserModel();
    $cadastrando = $userModel->cadastrando_novo_usuario($lista_array);

    if($cadastrando['status'] == 401){
        throw new Exception($cadastrando['msg']);
    }

    echo "Usuário cadastrado com sucesso!";

    ######### SIMULANDO UM BANCO DE DADOS SEJA PDO OU MYSQLI #######
   
} catch (Exception $e) {
    http_response_code(400);
    die($e->getMessage());
}