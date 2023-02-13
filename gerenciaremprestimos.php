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

<html>
    <head>
        <link rel="stylesheet" href="estilos.php">
    </head>
    <body>


<div>
    <a class="botao-add" href="adicionar.emprestimo.php?id=<?=$info['id'];?>">ADICIONAR EMPRESTIMO</a>
    <?php
    foreach($listaemprestimo as $emprestimos):
    ?>
    
    
    <ul class="linha-tabela">
        <div class="informações">
        <li ></li></li><a>Dinheiro emprestado: </a> <?=$emprestimos['divida_inicial'];?></li>
        <li ><a>Dívida total até data atual: </a> <?=$emprestimos['total_divida'];?></li>
        <li><a>Data de pagamento: </a><?=$emprestimos['data_pagar'];?></li>
        <li><a>Data do empréstimo: </a><?=$emprestimos['data_emprestado'];?></li>
       
        </div>
        <div class="botões-editar-excluir">
        <li class="abaixo">
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
</body>
</html>