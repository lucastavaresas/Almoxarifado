<?php
    session_start();
    require_once('inc/config.php');
    require_once('inc/EasyPDO.php');
    $bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);
    $id = $_SESSION['id'];
    echo $id;

    $bd->update("UPDATE solicitacoes SET stat= 'Reprovado' WHERE id = '".$id."'");
    echo 'solicitacao reprovada';
?>