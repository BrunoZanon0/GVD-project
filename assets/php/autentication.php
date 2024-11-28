<?php 

session_start();

if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
    header("location: ../../index.php"); // Normalmente eu usaria todos os valores da sessão para impedir que o usuario logue
    exit();
}
