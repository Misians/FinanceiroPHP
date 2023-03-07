<?php 
include 'emprestimo.class.php';
$emprestimos = new Emprestimo();
if (!empty($_GET['id_emprestimo'])) {

    $id_sent = ($_GET['id_emprestimo']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $info = $emprestimos->getInfoUnicoEmprestimo($id);
}
foreach($info as $informacao):
    $data_inicial_emprestimo = $informacao["data_emprestado"];
    echo $informacao["data_inicial"];        
    $data_atual = new DateTime(date('Y-m-d'));
    $data_inicial = new DateTime($data_inicial_emprestimo);
    $intervalo = $data_inicial->diff($data_atual); 
    $meses_desde_inicio = $intervalo->format('%m');
    $jurosapagarpormes = $informacao["divida_inicial"] * ($informacao["juros"]/100) * $meses_desde_inicio;

    endforeach;
    $informacao["total_divida"]= ($informacao["divida_inicial"] + $jurosapagarpormes);
    $japago = $informacao["japago"];
    
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar dívida</title>
</head>
<body>

<div class="content">
            <a>Valor inicial do emprestimo: <?php echo $informacao["divida_inicial"]?></a>
            <br/>
            <a>Valor total do emprestimo com os juros e pendencias: <?php echo $informacao["total_divida"]?></a>
            <br/>
            <a>juros a pagar:<?php  echo $informacao["juros"], " a ", $jurosapagarpormes, " b ", $meses_desde_inicio; ?></a><br/>
            <br/>
        <form class="form-add" method="POST" action="quitar.action.php">
            <label> Informe quanto o cliente pagou <br/>
            <input type="hidden" name="id_emprestimo" value="<?php echo $informacao["id_emprestimo"]?>" />
            <input type="text" name="japago">
            </label><br/>
            <input type="hidden" name="meses_adiados" value="<?php echo $informacao["meses_adiados"];?>" />
            <input type="hidden" name="tempjapago" value="<?php echo $japago;?>" />
            <input type="hidden" name="total_divida" value="<?php echo $informacao["total_divida"];?>" />
            <input type="submit" value="Adicionar">
        </form>
    </div>
        
    </body>
