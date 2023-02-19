<?php
require 'config.php';
include 'contato.class.php';
$contato = new Contato();

$lista = [];

$listacliente = $contato->getAll();
$listaemprestimo =$contato->getAllEmprestimos();


?>


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
		<a href="index.php"> < Voltar para Home</a>
		<h2>Cadastro</h2>
			<a href="adicionar.php">Cadastrar Cliente</a>
			<a href="gerenciarclientes.php">Visualizar Clientes</a>
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
	
    <?php
    foreach($listacliente as $cliente):
    ?>

    <ul class="content">
        <div class="box-content left w100 ">
        <div class="listacliente">
            <div >
                </li><a>Cliente: </a> <?=$cliente['name'];?></li>
                <li ><a>Email: </a> <?=$cliente['email'];?></li>
                <li><a>Contato: </a><?=$cliente['telefone'];?></li>
                <li><a>Endereço: </a><?=$cliente['endereco'];?></li>
                </div>
                </div>

                <li class="abaixo">
                    <div>
                        <a href="gerenciaremprestimos.php?id=<?=$cliente['id'];?>">
                            <img alt="ver emprestimos" class="imagem" src="src/img/dollar.png">
                        </a>
                        <a href="editar.php?id=<?=$cliente['id'];?>">
                            <img class="imagem" src="src/img/editar(1).png">
                        </a>
                        
                        <a href="remover.php?id=<?=$cliente['id'];?>" 
                        onclick="return confirm('tem certeza que quer excluir esse cliente?')">
                        <img class="imagem" src="src/img/excluir.png"></a>
                    </li>
                </div>
            </div>
        </div>
    </div>
    </ul>
    <?php
    endforeach;
    ?>
	<a class="content">    Clientes com dívida ativa não podem ser deletados</a>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src=js/main.js></script>
</body>
</html>