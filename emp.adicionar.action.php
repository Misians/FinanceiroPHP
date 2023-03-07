<?php
include 'emprestimo.class.php';
$emprestimo = new Emprestimo();
if (!empty($_POST['id'])) {
    $id1 = ($_POST['id']);
    $idA = (int)filter_var($id1, FILTER_SANITIZE_NUMBER_INT);
   
    $id_cliente = filter_input(INPUT_POST,'id');
    $juros = filter_input(INPUT_POST,'juros');
    $data_emprestado = filter_input(INPUT_POST,'data_emprestado');
    $data_pagar= filter_input(INPUT_POST,'data_pagar');
    $divida_inicial= filter_input(INPUT_POST,'divida_inicial');
    $total_divida = filter_input(INPUT_POST,'total_divida');
    $meses_adiados = filter_input(INPUT_POST,'meses_adiados');
    $japago = filter_input(INPUT_POST,'japago');

    $emprestimo->addEmprestimo($id_cliente, $juros, 
    $data_emprestado, $data_pagar, $divida_inicial, 0, 0, 0);
    header("Location: gerenciarclientes.php");
}