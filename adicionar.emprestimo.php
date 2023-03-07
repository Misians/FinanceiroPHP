<?php
include 'emprestimo.class.php';

include 'contato.class.php';
$emprestimo = new Emprestimo();
$contato = new Contato();

if (!empty($_GET['id'])) {

    $id_sent = ($_GET['id']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $info = $contato->getInfo($id);
}
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
			<a href="">Cadastrar Empréstimo</a>
			<a href="">Visualizar Empréstimos</a>
		<h2>Financeiro</h2>
			<a href="">Caixa</a>
			<a href="">Recebimento</a>
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

<form class="content" align="center" method="POST" action="emp.adicionar.action.php">

<label for="cliente">Escolha o cliente:</label>
<?php echo $info["id"]; ?>

<br/>
	<input type="hidden" name="id" value="<?php echo $info["id"];?>" />
    <label>
            % de Juros por mês: <br/>
            <input placeholder="Só o numero" type="text" name="juros">
        </label><br/><br/>
        <label>
            Data feita o empréstimo <br/>
            <input type="date" name="data_emprestado">
        </label><br/><br/>
        <label>
            Data a ser pago: <br/>
            <input type="date" name="data_pagar">
        </label><br/><br/>

        <label>
            Valor: <br/>
            <input placeholder="Apenas número sem . e ," type="text" name="divida_inicial">
        </label><br/><br/>
		<!--<input type="hidden" name="japago" value="<?php echo $info["japago"];?>" />
		<input type="hidden" name="meses_adiados" value="<?php echo $info["meses_adiados"];?>" />
		<input type="hidden" name="total_divida" value="0" />-->
        <input type="submit" value="Adicionar">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src=js/main.js></script>
</body>