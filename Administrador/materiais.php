<?php

require_once('../inc/config.php');
require_once('../inc/EasyPDO.php');

$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

$data = $bd->select("SELECT * FROM materiais");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais</title>
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
        <a href="/Administrador/administrador.php">Usuários</a>
        <br>
        <a href="/Administrador/materiais.php">Materiais</a>
    </div>
    <div>
        <a href="index.html">Sair</a>
    </div>
    <div>
        <form action="/Administrador/adicionar_material.php" method="post">
            <input type="submit" value="Novo Material" />
        </form>
    </div>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome do Material</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $dados):?>
                <tr>
                    <td><?=$dados['materiais'] ?></td>
                    <td><a href="/Administrador/editar_material.php?id=<?=$dados['id']?>">Editar</a></td>
                    <td><a href="/Administrador/deletar_material.php?id=<?=$dados['id']?>">Deletar</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>

</html>