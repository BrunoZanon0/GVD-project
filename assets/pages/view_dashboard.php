<?php 

session_start();

if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
    header("location: ../../index.php"); // Normalmente eu usaria todos os valores da sessão para impedir que o usuario logue
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once __DIR__ . "/../layouts/style.php"?>
</head>
<body>
<div >
        <?php include_once __DIR__."/../layouts/menu_superior.php";?>
        <div class=" text-center">
        <h5>Usuarios cadastrados até o momento</h5>
            
            <br>
            <table id="table_pesquisa" class="text-center table table-dark w-100">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Nome</th>
                        <th>Idade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION['emails'] as $dados => $key):?>
                        <?php foreach($key as $dados):?>
                            <tr>
                                <td scope="row" width="50"><?= $dados['email'] ?></td>
                                <td scope="row"><?= $dados['nome'] ?></td>
                                <td scope="row"><?= $dados['idade'] ?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </tbody>
            </table>
            <div>
            <br>
            </div>
        </div>
    </div>
</body>
</html>