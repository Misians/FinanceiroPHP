<?php
include 'emprestimo.class.php';
$emprestimo = new Emprestimo();
if (!empty($_POST['id'])) {
    $id1 = ($_POST['id']);
    $idA = (int)filter_var($id1, FILTER_SANITIZE_NUMBER_INT);
   
    $id = filter_input(INPUT_POST,'id');
    $juros = filter_input(INPUT_POST,'juros');
    $dataemprestimo = filter_input(INPUT_POST,'dataemprestimo');
    $datapagamento= filter_input(INPUT_POST,'datapagamento');
    $valor= filter_input(INPUT_POST,'valor');
    $mesesadiados = NULL;
    $total_divida = NULL;
    if(!empty($id)){
        $emprestimo->addEmprestimo($juros, $idA, $valor, $dataemprestimo, $datapagamento);
        header("Location: gerenciarclientes.php");
    }else{
        echo 'ERROR';
    }
        
        exit;

}else{
    echo 'ERROR, NÃO FOI IDENTIFICADO CLIENTE'.$idA; //n tá vazia
}

