<?php
include 'contato.class.php';
$contato = new Contato();

$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email');
$endereco = filter_input(INPUT_POST,'endereco');
$telefone = filter_input(INPUT_POST,'telefone');

if (!empty($_POST['email'])){
            $contato->adicionar($email, $name, $telefone, $endereco);
            header("Location: gerenciarclientes.php");
            exit;
}


