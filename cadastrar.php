<?php
if(isset($_POST['username']) && isset($_POST['senha'])){
    require 'db_conn.php';
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    if(empty($username)){
        header("Location: login.php/mess=error");
    }else{
        try{
            $stmt = $conn->prepare('INSERT INTO usuario (username, senha) VALUES (:username, :senha)');
            $stmt->execute(array(
                ':username' => $username,
                ':senha' => $senha
            ));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        header("Location: index.php");
        $conn = null;
        exit();
    }
}
