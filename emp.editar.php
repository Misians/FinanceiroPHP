<?php 
include 'emprestimo.class.php';
$emprestimos = new Emprestimo();
if (!empty($_GET['id_emprestimo'])) {

    $id_sent = ($_GET['id_emprestimo']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $info = $emprestimos->getInfoUnicoEmprestimo($id);
}
foreach($info as $informacao):
?>
<head>
        <link rel="stylesheet" href="estilos.php">
        <title>EDITAR USUARIO</title>
</head>
    <body>
        <h1> Editar dívida do cliente</h1>
        <form class="form-add" method="POST" action="emp.adicionar.action.php">

        <input type="hidden" name="id" value="<?php echo $infor;?>" />
        <label>
            % de Juros por mês: <br/>
            <input placeholder="Só o numero" type="text" name="juros" value="<?php echo $informacao['juros'];?>">
        </label><br/><br/>
        <label>
            Data feita o empréstimo <br/>
            <input type="date" name="dataemprestimo" value="<?php echo $informacao['data_emprestado'];?>">
        </label><br/><br/>
        <label>
            Data a ser pago: <br/>
            <input type="date" name="datapagamento" value="<?php echo $informacao['data_pagar'];?>">
        </label><br/><br/>

        <label>
            Valor: <br/>
            <input placeholder="Apenas número sem . e ," type="text" name="valor" value="<?php echo $informacao['divida_inicial'];?>">
        </label><br/><br/>
        <input type="submit" value="Adicionar">
        </form>
    </body>
<?php endforeach;?>