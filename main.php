<!--Loggout-->
<?php
include 'emprestimo.class.php';

$emprestimo = new Emprestimo();
$lista = [];
$lista = $emprestimo->getAllEmprestimos();
$atrasados = 0;
$emtempo = 0;
$perto = 0;
foreach($lista as $conta){
	$totalemprestado = $totalemprestado + $conta['divida_inicial'];
	$qtdemprestimos++;
	$totalrecebido = $totalrecebido + $conta['japago'];
	$data_pagar_emprestimo = $conta["data_pagar"];        
	$data_atual = new DateTime(date('Y-m-d'));
	$data_inicial = new DateTime($data_pagar_emprestimo);
	$intervalo = $data_inicial->diff($data_atual);
	
	if($intervalo < 0){
		$atrasados++;
	}
	if($intervalo <= 5 && $intervalo < 0){
		$perto++;
	}
	if($intervalo ){
		$emtempo++;
	}

}?>

<?php
include 'contato.class.php';
$contato = new Contato();
$lista1 = [];
$lista1 = $contato->getAll();
foreach($lista1 as $cliente){
	$clientenumero++;
}?>

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
						<p>R$ <?php echo $totalemprestado ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total Recebido</h2>
						<p>R$ <?php echo $totalrecebido?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total a Receber</h2>
						<p>R$ <?php echo ($totalemprestado - $totalrecebido)?></p>
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
						<p><?php echo $qtdemprestimos?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>Total de clientes</h2>
						<p><?php echo $clientenumero	?></p>
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
			

				<?php
    				foreach($lista as $conta):
					$date1 = date_create(date('Y/m/d'));
					$date2 = date_create($conta['data_pagar']);
					$diff = date_diff($date1,$date2);
					if($date2 < $date1){
						$contadoratrasado++;
					}
					if($date2 > $date1){
						$contadorperto++;
					}
						endforeach
        			?>

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">

					<h2>Vencidos</h2>
						<p><?php echo $contadoratrasado?></p> <!-- AQUI SÃO OS QUE ESTÃO VENCIDOS -->
				</div><!--box-metricas-wraper-->
			</div><!--box-metricas-single-->

			<div class="box-metricas-single">
				<div class="box-metricas-wraper">
					<h2>A Vencer</h2>
						<p><?php echo $contadorperto?></p> <!-- AQUI SÃO OS QUE ESTÃO PERTO DE VENCER -->
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