<?php
include 'emprestimo.class.php';

include 'contato.class.php';
$emprestimo = new Emprestimo();
$contato = new Contato();

$mesesadiados = 10;
$total = 10;
if(!empty($_GET['id'])){
    $id_sentA = ($_GET['id']);
    $idA = (int)filter_var($id_sentA, FILTER_SANITIZE_NUMBER_INT);
    $infoA = $contato->getInfo($idA);

    }
    else{
        header("Location: gerenciarclientes.php");
    }
    $infor = $infoA['id'];
?>

<head>
        <link rel="stylesheet" href="estilos.php">
        <title>ADICIONAR DÍVIDA</title>
        
        
</head>
<body>
<h1>Adicionar dívida</h1>
<form class="form-add" method="POST" action="emp.adicionar.action.php">

    <input type="hidden" name="id" value="<?php echo $infor;?>" />

    <label>
            % de Juros por mês: <br/>
            <input placeholder="Só o numero" type="text" name="juros">
        </label><br/><br/>
        <label>
            Data feita o empréstimo <br/>
            <input type="date" name="dataemprestimo">
        </label><br/><br/>
        <label>
            Data a ser pago: <br/>
            <input type="date" name="datapagamento">
        </label><br/><br/>

        <label>
            Valor: <br/>
            <input placeholder="Apenas número sem . e ," type="text" name="valor">
        </label><br/><br/>
        <input type="submit" value="Adicionar">
    </form>
</body>