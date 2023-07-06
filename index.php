<?php
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas PHP</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <h3 class="texto-logo">Lista de Tarefas</h3>
        </nav>
    </header>
    <main class="conteudo">
        <section class="add">
            <form action="app/add.php" method="POST" autocomplete="off">
                <input type="text" class="text-input" name="titulo" placeholder="Digite um nome para a tarefa">
                <input type="submit" class="btn-submit">
            </form>
        </section>
        <section class="list">
            <?php
            $tarefas = $conn->query("SELECT * FROM tarefas order by id desc");
            if ($tarefas->rowCount() === 0) {
            ?>
                <section class="list empty">
                    <div>Vazio</div>
                </section>
                <?php } else {
                while ($tarefa = $tarefas->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="item flex">
                        <span class="deletar" id="<?php echo $tarefa['id'] ?>">x</span>
                        <div class="block">
                            <h2><?php echo $tarefa['titulo'] ?></h2>
                            <small>Criado em: <?php echo $tarefa['date_time'] ?></small>
                        </div>
                        <?php if ($tarefa['checked'] === 0) { ?>
                            <input class="check" type="checkbox" id="<?php echo $tarefa['id'] ?>">
                        <?php } else { ?>
                            <input class="check" type="checkbox" id="<?php echo $tarefa['id'] ?>" checked>
                        <?php } ?>
                    </div>
            <?php }
            } ?>
        </section>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.deletar').click(function(){
            const id = $(this).attr('id');
            $.post("/app/delete.php", {
                id: id
            },
            (data)=>{
                $(this).parent().hide(600);
            })
        })
    });
</script>
<script src="js/script.js"></script>

</html>