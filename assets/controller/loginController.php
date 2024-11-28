<?php 

include_once __DIR__ . "/../model/userModel.php";

try {

    if(!isset($_POST['email']) || empty($_POST['email'])) throw new Exception('Email é obrigatório');
    if(!isset($_POST['senha']) || empty($_POST['senha'])) throw new Exception('Senha é obrigatório');

    $email  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $senha  = filter_var($_POST['senha'],FILTER_SANITIZE_STRING);

    $senha_hash = password_hash($senha,PASSWORD_DEFAULT);

    ######### SIMULANDO UM BANCO DE DADOS SEJA PDO OU MYSQLI #######

    $lista_array = [
        'email' => $email,
        'senha' => $senha,
    ];
    
    $userModel = new UserModel();
    $cadastrando = $userModel->login_user_to_sistem($lista_array);

    if($cadastrando['status'] == 401){
        throw new Exception($cadastrando['msg']);
    }

    echo $email;

    ######### SIMULANDO UM BANCO DE DADOS SEJA PDO OU MYSQLI #######
   
} catch (Exception $e) {
    http_response_code(400);
    die($e->getMessage());
}