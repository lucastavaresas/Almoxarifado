<?php
require_once('../inc/config.php');
require_once('../inc/EasyPDO.php');

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$check = $bd->select("SELECT * FROM materiais");

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
    <div class="As">
        <div class="so"><a href="solicitador.php">Solicitações</a></div>
        <br />
        <a href="../index.html">Sair</a>
    </div>
    <form action="enviarsolicitacao.php" method="POST">
        <div>
            <?php foreach($check as $checker): ?>
            <input type="checkbox" name="ativo[]"
                value="<?= $checker['materiais']?>">
            <label for="<?= $checker['materiais']?>"> <?= $checker['materiais'] ?> </label>
            <?php endforeach; ?>
        </div>
        <div>
            <button type="submit">Enviar Solicitação</button>
        </div>
    </form>
    <form action="solicitador.php">
        <div>
            <button type="submit">Cancelar</button>
        </div>
    </form>
</body>

</html>