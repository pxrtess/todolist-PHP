<?php
if(isset($_POST['titulo'])){
    require '../db_conn.php';
    $titulo = $_POST['titulo'];
    if(empty($titulo)){
        header("Location: ../index.php/mess=error");
    }else{
        try{
            $stmt = $conn->prepare('INSERT INTO tarefas (titulo) VALUES (:titulo)');
            $stmt->execute(array(
                ':titulo' => $titulo
            ));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        header("Location: ../index.php");
        $conn = null;
        exit();
    }
}
