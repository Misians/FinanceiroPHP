<?php
include 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone= $_POST['telefone'];

    $contato->editar( $email, $name, $telefone, $endereco, $id);
    header("Location: gerenciarclientes.php");
    exit;
}
else{
    header("Location: editar.php");
    exit;
}


