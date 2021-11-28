<?php

require_once('../inc/config.php');
require_once('../inc/EasyPDO.php');

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$contatos = $bd->select("SELECT * FROM solicitacoes");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Signika&display=swap");

    .TextoBase {
        position: absolute;
        width: 859.21px;
        height: 55.8px;
        left: 348.83px;
        top: 143.55px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 50px;
        line-height: 68px;
        font-family: "Signika", sans-serif;
        color: #7a7a7a;
    }

    .As {
        font-family: "Signika", sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 25px;

        color: #0c4284;
    }

    input[type="submit"] {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 0px 48px;

        position: absolute;
        width: 247px;
        height: 40px;
        left: 1013.03px;
        top: 244.02px;

        background: #1473e6;
        border-radius: 50px;

        font-family: "Signika", sans-serif;
        font-style: normal;
        font-weight: normal;
        text-align: center;
        display: block;
        margin-right: auto;
        margin-left: auto;
        color: #ffffff;
    }

    .table {
        position: absolute;
        width: 996.04px;
        height: 39.6px;
        left: 352px;
        top: 352.35px;
    }
    </style>
</head>

<body>
    <div class="TextoBase">Solicitações</div>
    <div class="As">
        <div class="so"><a href="solicitador.php">Solicitações</a></div>
        <br />
        <a href="../index.html">Sair</a>
    </div>
    <div class="new">
        <form action="novasolicitacao.php" method="post">
            <input type="submit" value="Nova Solicitação" />
        </form>
    </div>
    <div class='table'>
        <table border='1'>
            <thead>
                <tr>
                    <th>Data da Solicitação</th>
                    <th>Solicitador</th>
                    <th>Material Solicitado</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($contatos as $contato):?>
                <tr>
                    <td> <?=$contato['data'] ?> </td>
                    <td> <?=$contato['solicitador'] ?> </td>
                    <td> <?=$contato['materiais_solicitados'] ?> </td>
                    <td> <?=$contato['stat']?> </td>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>