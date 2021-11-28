<?php

if(!isset($_GET['id'])){
    die('acesso invalido');
}
$id = $_GET['id'];

require_once('../inc/config.php');
require_once('../inc/EasyPDO.php');

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$params = [
    ':id' => $id
];

$bd->delete("DELETE FROM materiais WHERE id = :id",$params);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>material deletado</title>
</head>
<body>
    material deletado
    <a href='/Administrador/materiais.php'>Voltar</a>
</body>
</html>