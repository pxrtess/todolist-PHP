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
            <h3 class="texto-logo">Lista de Tarefas - Login</h3>
        </nav>
    </header>
    <section class="section-login">
        <form method="POST" action="login.php" class="login-form" id="formLogin">
            <label for="username">Username</label>
            <input type="text" name="username"><br>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha"><br>
            <input type="submit" class="btn-submit" value="Entrar">
        </form>
        <form method="POST" action="cadastrar.php" class="login-form" id="formCadastro" style="display: none;">
            <label for="username">Username</label>
            <input type="text" name="username"><br>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha"><br>
            <input type="submit" class="btn-submit" value="Cadastrar">
        </form>
        <div style="width: fit-content; margin:auto; margin-top:1em;">
            <button id="btnCadastrar" onclick="cadastrar()" style="background-color: #3189e8; color:white;">Ir para cadastro</button>
            <button id="btnLogar" onclick="logar()" style="display: none;background-color: #35ad56; color: white;">Ir para login</button>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>
