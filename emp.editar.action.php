<?php
require_once('emprestimo.class.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emprestimo = new Emprestimo();
    $id_emprestimo = $_POST['id_emprestimo'];
    $juros = $_POST['juros'];
    $data_emprestado = $_POST['data_emprestado'];
    $data_pagar = $_POST['data_pagar'];
    $divida_inicial = $_POST['divida_inicial'];

    $emprestimo->editarEmprestimo($juros, $data_emprestado, $data_pagar,
    $divida_inicial, $id_emprestimo);

    header('Location: gerenciarclientes.php');
    exit;
}
?>