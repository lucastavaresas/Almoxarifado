<?php
session_start();
if(!isset($_GET['id'])){
    die('acesso invalido');
}

$id = $_GET['id'];

$_SESSION['id'] = $id;

require_once('inc/config.php');
require_once('inc/EasyPDO.php');
$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$params = [
    ':id' => $id
];

$dados = $bd->select("SELECT * FROM solicitacoes WHERE id = :id",$params)[0];



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
    <div>
        <a href="aprovador.php">Solicitações</a>
    </div>
    <div>
        <a href="index.html">Sair</a>
    </div>
    <div>
        Solicitador: <?= $dados['solicitador'] ?>
    </div>
    <div>
        Data: <?= $dados['data'] ?>
    </div>
    <div>
        Status: <?= $dados['stat'] ?>
    </div>
    <div>
        Materiais solicitado: <?= $dados['materiais_solicitados'] ?>
    </div>
    <div>
        <form action="Aprovando.php" method="post">
            <input type="submit" value="Aprovar" />
        </form>
    </div>
    <div>
        <form action="Reprovando.php" method="post">
            <input type="submit" value="Reprovar" />
        </form>
    </div>
    <?php exit(); ?>
</body>

</html>