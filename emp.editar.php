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

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.php">
	<link href="css/style.css" rel="stylesheet">
	<title>Editar dívida</title>
</head>
<body>
<div class="content">
        <form class="form-add" method="POST" action="emp.editar.action.php">

        <input type="hidden" name="id_emprestimo" value="<?php echo $informacao["id_emprestimo"];?>" />
        <label>
            % de Juros por mês: <br/>
            <input type="text" name="juros" value="<?php echo $informacao['juros'];?>">
        </label><br/><br/>
        <label>
            Data feita o empréstimo <br/>
            <input type="date" name="data_emprestado" value="<?php echo $informacao['data_emprestado'];?>">
        </label><br/><br/>
        <label>
            Data a ser pago: <br/>
            <input type="date" name="data_pagar" value="<?php echo $informacao['data_pagar'];?>">
        </label><br/><br/>

        <label>
            Valor: <br/>
            <input type="text" name="divida_inicial" value="<?php echo $informacao['divida_inicial'];?>">
        </label><br/><br/>
		<a><?php echo $id, " A ", $idA," B ", $_GET['id_emprestimo']?></a>
        <input type="submit" value="Atualizar">
        </form>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src=js/main.js></script>
    </body>
<?php endforeach;?>