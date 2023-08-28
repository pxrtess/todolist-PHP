<?php
if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id'];

    if(empty($id)){
        echo 0;
    }else{
        try{
            $stmt = $conn->prepare('DELETE FROM tarefas WHERE id = :id');
            $res = $stmt->execute(array(
                ':id' => $id
            ));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        header("Location: ../todolist.php/");
        $conn = null;
        exit();
    }
}else{
    header("Location: ../todolist.php/mess=error");
}
