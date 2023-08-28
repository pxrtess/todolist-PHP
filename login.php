<?php
require 'db_conn.php';
session_start();
if(isset($_POST['username']) && isset($_POST['senha'])){
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE username = (:username) AND senha = (:senha)");
    $stmt->execute(array(
        ':username' => $username,
        ':senha' => $senha
    ));
    $result = $stmt->fetchAll();
    if(count($result) > 0){
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result[0]['id'];
        header('Location:../todolist.php');
    }else{
        header('Location:../index.php');
    }
}