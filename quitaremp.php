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


<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<html>
<head>
    <link rel="stylesheet" href="estilos.php">
	<script src="https://kit.fontawesome.com/1825bd9b94.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>Painel de Controle</title>
</head>
<body>
    
<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		<div class="nome-usuario">
			</div><!--box-cargo-->
		</div><!--nome-usuario-->
	</div><!--box-usuario-->


	<div class="itens-menu">
		<h2>Cadastro</h2>
			<a href="adicionar.php">Cadastrar Cliente</a>
			<a href="gerenciarclientes.php">Visualizar Clientes</a>
		<h2>Empréstimo</h2>
			<a href="adicionar.emprestimo.php?id=<?=$info['id'];?>"> Cadastrar Empréstimo</a>
		<h2>Administração</h2>
			<a href="">Adicionar Usuário</a>
			<a href="">Editar Usuário</a>
	</div><!--intens-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->

<header>
	<div class="center">
		<div class="menu-botao">
			<i class="fa fa-bars"></i>
		</div><!--menu-botao-->
		<div class="loggout">
			<a href="?loggout"><i class="fa fa-window-close"></i><span> Sair</span></a>
		</div><!--loggout-->
	</div><!--center-->
	<div class="clear"></div><!--clear-->
</header>


<!DOCTYPE html>
<html>
<head>
	<title>Editar dívida</title>
</head>
<body>

<div class="content">
    <form class="form-add" method="POST" action="quitar.action.php">
            <a>Valor inicial do emprestimo: <?php echo $informacao["divida_inicial"]?></a>
            <br/>
            <a>Valor total do emprestimo com os juros e pendencias: <?php echo $informacao["total_divida"]?></a>
            <br/>
            <a>já pago pelo cliente:<?php  echo $informacao["japago"] ?></a><br/>
            <br/>
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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src=js/main.js></script>
    </body>
