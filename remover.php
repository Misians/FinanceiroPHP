<?php
include 'contato.class.php';
$contato = new Contato();
if (!empty($_GET['id'])) {

    $id_sent = ($_GET['id']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $contato->removerCliente($id);
}
else{
    echo 'Não foi possivel remover cliente';
}
    header("Location: gerenciarclientes.php");