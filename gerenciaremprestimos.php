<?php
include 'emprestimo.class.php';
include 'contato.class.php';
$emprestimo = new Emprestimo();

$contato = new Contato;



if(!empty($_GET['id'])){
    $id_sent = ($_GET['id']);
    $id = (int)filter_var($id_sent, FILTER_SANITIZE_NUMBER_INT);
    $info = $contato->getInfo($id);

    }
    else{
        header("Location: gerenciarclientes.php");
    }
    $listaemprestimo = $emprestimo->getInfoEmprestimos($id);

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


<div>
    <div class="content">
    <!--<a class="botao-add" href="adicionar.emprestimo.php?id=<?=$info['id'];?>">ADICIONAR EMPRESTIMO</a>-->
    <?php
    foreach($listaemprestimo as $emprestimos):
    ?>
    <div>
        
    <div class="listaemp">
        <ul class="box-content left w100 ">
   
        <div class="listacliente">
        <li><a>Dinheiro emprestado: </a> <?=$emprestimos['divida_inicial'];?></li>
        <li ><a>Dívida total até data atual: </a> <?=$emprestimos['total_divida'];?></li>
        <li><a>Data de pagamento: </a><?=$emprestimos['data_pagar'];?></li>
        <li><a>Data do empréstimo: </a><?=$emprestimos['data_emprestado'];?></li>
       
        </div>
        <div class="botões-editar-excluir">
        <li class="abaixo">
        </a>
        <a href="quitaremp.php?id_emprestimo=<?=$emprestimos['id_emprestimo'];?>">
            <img class="imagem" src="src/img/money.png">
        </a>
        <a href="emp.editar.php?id_emprestimo=<?=$emprestimos['id_emprestimo'];?>">
            <img class="imagem" src="src/img/editar(1).png">
        </a>
            
        <a href="remover_emprestimo.php?id_emprestimo=<?=$emprestimos['id_emprestimo'];?>" 
        onclick="return confirm('tem certeza que quer excluir esse cliente?')">
            <img class="imagem" src="src/img/excluir.png">
        </a>
        </li>
    </div>
    </ul>
    <?php
    endforeach;
    ?>
</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script src=js/main.js></script>
</body>
</html>