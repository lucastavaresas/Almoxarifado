<?php
session_start();
///////////////////////////////////////////
// Verificando se o usuario entrou pelo POST
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    die('Por favor volte e insira os dados');
}

// Verificando se existe usuario e senha
if (empty($_POST['Email']) || empty($_POST['Senha'])){
    header("Location:index.html");
}

// adicionar a base dados
require_once ('inc/config.php');
require_once('inc/EasyPDO.php');

//ligar a base de dados
$bd = new EasyPDO\EasyPDO(MYSQL_OPTIONS);
//////////////////////////////////////////

//encaminhamento para a pagina certa
$email = $_POST['Email'];
$senha = $_POST['Senha'];
$_SESSION['email'] = $email;

$verificao = $bd->select("SELECT * FROM dados");

foreach ($verificao as $verificar){
    if (($email == $verificar['email']) && ($senha == $verificar['senha']) && ($verificar['funcao'] == 'Administrador')){
        die(header('Location:/Administrador/administrador.php'));
    }
    if  (($email == $verificar['email']) && ($senha == $verificar['senha']) && ($verificar['funcao'] == 'Aprovador')) {
        die(header('Location:/Aprovador/aprovador.php'));
    }
    if (($email == $verificar['email']) && ($senha == $verificar['senha'])){
        die(header('Location:/Solicitador/solicitador.php'));
    }
}
die(header('Location:index.html'));
exit();
