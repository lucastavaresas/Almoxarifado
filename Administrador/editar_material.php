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

$dados = $bd->select("SELECT * FROM materiais WHERE id = :id",$params)[0];
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
    <form action="/Administrador/editar_material_submit.php" method="POST">
        <div>
            <label>nome</label>
            <input type="text" name="text_nome" value="<?= $dados['materiais']?>">
        </div>
        <div>
            <input type="hidden" name="text_id" value="<?= $dados['id']?>">
        </div>
        <div>
            <input type="submit" value="Salvar">
        </div>
        <div>
            <a href='/Administrador/administrador.php'>Voltar</a>
        </div>


    </form>
</body>

</html>