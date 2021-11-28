<?php
session_start();
$newemail = $_SESSION['email'];
echo '<br>';
$data = date('Y-m-d');
echo $data;
echo '<br>';
require_once('../inc/config.php');
require_once('../inc/EasyPDO.php');
$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);

if ((!isset($_POST['ativo']))){
    die(header('Location:novasolicitacao.php'));
}

$name = $bd->select("SELECT nome FROM dados WHERE email = '".$newemail."'");
$addname = $name[0]['nome'];

if ($_POST && isset($_POST['ativo'])){
    $ativo = $_POST['ativo'];
    $con = new PDO('mysql:host=localhost;dbname=systema', 'user', '6iTo56ku');
    foreach($ativo as $valor){
        $sql = "INSERT INTO solicitacoes(id,materiais_solicitados,data,solicitador) VALUES (0,'".$valor."','".$data."','".$addname."')";
        $con->query($sql);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Solicitação</title>
</head>
<body>
    <div>Nova Solicitação enviada com sucesso</div>
    <a href="solicitador.php">Voltar Para a página inicial</a>
</body>
</html>