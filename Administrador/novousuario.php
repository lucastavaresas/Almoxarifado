<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novo usuário</title>
</head>
<body>
    <form action="adicionar_usuario_submit.php" method="POST">
        <div>
            <label>Nome</label>
            <input type="text" name="text_nome">
        </div>
        <div>
            <label>E-mail</label>
            <input type="text" name="text_email">
        </div>
        <div>
            <label>Função</label>
            <input type="text" name="text_funcao">
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="text_senha">
        </div>
        <div>
            <input type="submit" value="Adicionar">
        </div>
        <div>
            <a href='administrador.php'>Voltar</a>
        </div>
    </form>
</body>
</html>