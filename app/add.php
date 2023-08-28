<?php
require '../login.php';
if(isset($_POST['titulo'])){
    require '../db_conn.php';
    $titulo = $_POST['titulo'];
    if(empty($titulo)){
        header("Location: ../todolist.php/mess=error");
    }else{
        try{
            $stmt = $conn->prepare('INSERT INTO tarefas (titulo, user_id) VALUES (:titulo, :id_usuario)');
            $stmt->execute(array(
                ':titulo' => $titulo,
                ':id_usuario' => $_SESSION['id']
            ));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        header("Location: ../todolist.php");
        $conn = null;
        exit();
    }
}
