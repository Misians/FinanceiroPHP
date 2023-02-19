<!--Loggout-->

<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
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
		<?php
			if($_SESSION['img'] == ''){
		?>
		<div class="avatar-usuario">
			<i class="fa fa-user"></i>	
		</div><!--avatar-usuario-->
		<?php }else{ ?>
		<div class="imagem-usuario">
			<img src="imagens/<?php echo $_SESSION['img']; ?>">	
		</div><!--imagem-usuario-->
		<?php } ?>

		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome']; ?></p>
			<div class="box-cargo">
				<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
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

<div class="content">
	
	<div class="box-content left w100">
		<!--<h2><i class="fa fa-home"></i>  Painel de Controle - <?php echo $_SESSION['nome']; ?></h2>-->
		<h2>Caixa Geral:</h2>
		<div class="box-metricas">
			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total Emprestado</h2>
						<p>R$ 150,00</p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total Recebido</h2>
						<p>R$ 200,00</p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total a Receber</h2>
						<p>R$ 300,00</p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Juros Recebido</h2>
						<p>R$ 150,00</p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="clear"></div><!--clear-->
		</div><!--box-metricas-->
	</div><!--box-content-->
</div><!--content-->

<div class="content">
	
	<div class="box-content left w100">
		<!--<h2><i class="fa fa-home"></i>  Painel de Controle - <?php echo $_SESSION['nome']; ?></h2>-->
		<h2>Empréstimo:</h2>
		<div class="box-metricas">
			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Empréstimos Ativos</h2>
						<p>20</p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total de Empréstimos</h2>
						<p>65</p>
				</div><!--box-metricas-wraper-->
			</div><!--box-metricas-single-->
			<div class="clear"></div><!--clear-->
		</div><!--box-metricas-->
	</div><!--box-content-->
</div><!--content-->

<div class="content">
	
	<div class="box-content left w100">
		<!--<h2><i class="fa fa-home"></i>  Painel de Controle - <?php echo $_SESSION['nome']; ?></h2>-->
		<h2>Prazos:</h2>
		<div class="box-metricas">
			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>No Prazo</h2>
						<p>15</p>
				</div><!--box-metricas-wraper-->
			</div><!--box-metricas-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Vencidos</h2>
						<p>3</p>
				</div><!--box-metricas-wraper-->
			</div><!--box-metricas-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>A Vencer</h2>
						<p>2</p>
				</div><!--box-metricas-wraper-->
			</div><!--box-metricas-single-->
			<div class="clear"></div><!--clear-->
		</div><!--box-metricas-->
	</div><!--box-content-->
</div><!--content-->





<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script src=js/main.js></script>
</body>
</html>