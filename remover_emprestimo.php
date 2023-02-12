<?php
include 'emprestimo.class.php';
$emprestimos = new Emprestimo();
if (!empty($_GET['id_emprestimo'])) {

    $id_sent = ($_GET['id_emprestimo']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $emprestimos->removerEmprestimo($id);
}
    header("Location: gerenciaremprestimos.php");