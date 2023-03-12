
<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
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
			<a href="gerenciarclientes.php">Visualizar Emprestimos</a>
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


<div class ="content">
    <form class="form-add" method="POST" action="adicionar_action.php">
        <label>
            Nome: <br/>
            <input type="text" name="name">
        </label><br/><br/>
        <label>
            Email: <br/>
            <input type="text" name="email">
        </label><br/><br/>
        <label>
            Endereço: <br/>
            <input type="text" name="endereco">
        </label><br/><br/>
        <label>
            Telefone: <br/>
            <input type="tel" name="telefone" placeholder="(84) 99999-9999">
        </label><br/><br/>
        <input type="submit" value="Adicionar">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script src=js/main.js></script>
</body>