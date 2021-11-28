<?php

require_once('inc/config.php');
require_once('inc/EasyPDO.php');

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$data = $bd->select("SELECT * FROM solicitacoes");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        width: 100%;
    }

    th {
        height: 70px;
    }
    </style>
</head>

<body>
    <div>
        <a href="aprovador.php">Solicitações</a>
    </div>
    <div>
        <a href="index.html">Sair</a>
    </div>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Solicitador</th>
                    <th>Status</th>
                    <th>Analisar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $dados):?>
                <tr>
                    <td><?=$dados['data'] ?></td>
                    <td><?=$dados['solicitador'] ?></td>
                    <td><?=$dados['stat']?></td>
                    <td><a href="analisar_pedido.php?id=<?=$dados['id']?>">Analisar Pedido</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>

</html>