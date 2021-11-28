<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die('acesso invalido');
}
echo '<pre>';

$id = $_POST['text_id'];
$material = $_POST['text_nome'];

require_once('inc/config.php');
require_once('inc/EasyPDO.php');
$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$params = [
    ':id' => $id,
    ':nome' => $material
];

$bd->update("UPDATE materiais SET materiais = :nome WHERE id = :id",$params);
echo 'atualizado';