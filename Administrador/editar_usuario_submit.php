<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die('acesso invalido');
}
echo '<pre>';

$id = $_POST['text_id'];
$nome = $_POST['text_nome'];
$email = $_POST['text_email'];
$funcao = $_POST['text_funcao'];
$senha = $_POST['text_senha'];

require_once('../inc/config.php');
require_once('../inc/EasyPDO.php');
$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$params = [
    ':id' => $id,
    ':nome' => $nome,
    ':email' => $email,
    ':funcao' => $funcao,
    ':senha' => $senha
];

$bd->update("UPDATE dados SET nome = :nome, email = :email, funcao = :funcao, senha = :senha WHERE id = :id",$params);
echo 'atualizado';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='/Administrador/administrador.php'></a>
</body>
</html>