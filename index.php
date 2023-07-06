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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <header class="header">
        <nav class="navbar">
        <i class="uil uil-clipboard-notes"></i>
            <h3 class="texto-logo">Lista de Tarefas</h3>
        </nav>
    </header>
    <main class="conteudo">
        <section class="add">
            <form class="flex" action="app/add.php" method="POST" autocomplete="off">
                <input type="text" class="text-input" name="titulo" placeholder="Digite um nome para a tarefa">
                <input type="submit" class="btn-submit">
            </form>
        </section>
        <section class="lista" id="lista">
            <?php
            $tarefas = $conn->query("SELECT * FROM tarefas order by id desc");
            if ($tarefas->rowCount() === 0) {
            ?>
                <section>
                    <h3>Lista vazia, insira uma tarefa primeiro.</h3>
                </section>
                <?php } else {
                while ($tarefa = $tarefas->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="item flex" id="item<?php echo $tarefa['id']?>">
                        <?php if ($tarefa['checked'] === 0) { ?>
                            <div class="block">
                                <input class="check-box" data-tarefa-id="<?php echo $tarefa['id'] ?>" type="checkbox" id="<?php echo $tarefa['id'] ?>">
                                <h2><?php echo $tarefa['titulo'] ?></h2>
                                <small>Criado em: <?php echo $tarefa['date_time'] ?></small>
                            </div>
                            <div class="flex div-span">
                                <span class="deletar" id="<?php echo $tarefa['id'] ?>" onclick="apagarItem(<?php echo $tarefa['id'] ?>)"><i class="uil uil-times"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="block">
                                <input class="check-box" data-tarefa-id="<?php echo $tarefa['id'] ?>" type="checkbox" id="<?php echo $tarefa['id'] ?>" checked>
                                <h2 class="checked"><?php echo $tarefa['titulo'] ?></h2>
                                <small>Criado em: <?php echo $tarefa['date_time'] ?></small>
                            </div>
                            <div class="flex div-span">
                                <span class="deletar" id="<?php echo $tarefa['id'] ?>" onclick="apagarItem(<?php echo $tarefa['id'] ?>)"><i class="uil uil-times"></i></span>
                            </div>
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
        $('.deletar').click(function() {
            const id = $(this).attr('id');
            $.post("/app/delete.php", {
                id: id
            });
        });
        $('.check-box').click(function() {
            const id = $(this).attr('data-tarefa-id');

            $.post('app/check.php', {
                    id: id
                },
                (data) => {
                    if (data != 'Error') {
                        const h2 = $(this).next();
                        if (data === '1') {
                            h2.removeClass('checked');
                        } else {
                            h2.addClass('checked');
                        }
                    }
                })
        })
    });
</script>
<script src="js/script.js"></script>

</html>