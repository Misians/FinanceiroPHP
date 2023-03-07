<?php
require_once('emprestimo.class.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $emprestimo = new Emprestimo();
    $id_emprestimo = $_POST["id_emprestimo"];
    //$tempjapago = $_POST["tempjapago"];
    $japago = $_POST["japago"] + $_POST["tempjapago"];
    $total_divida = $_POST["total_divida"] - $japago;
    $emprestimo->quitarEmprestimo($id_emprestimo, $japago, $total_divida);
    header('Location: gerenciarclientes.php');
}
    
?>