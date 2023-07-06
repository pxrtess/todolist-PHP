<?php
if (isset($_POST['id'])) {
    require '../db_conn.php';
    $id = $_POST['id'];
    $tarefas = $conn->prepare("SELECT id, checked FROM tarefas WHERE id = :id");
    $tarefas->execute(array(
        ':id' =>$id
    ));
    $tarefa = $tarefas->fetch();
    $uID = $tarefa['id'];
    $checked = $tarefa['checked'];
    $uChecked = $checked ? 0 : 1;
    $response = $conn->query("UPDATE tarefas SET checked=$uChecked WHERE id = $uID");
    if($response){
        echo $checked;
    }else{
        echo "Error";
    }
    $conn = null;
    exit();
}
