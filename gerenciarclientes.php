<?php
require 'config.php';
include 'contato.class.php';
$contato = new Contato();

$lista = [];

$listacliente = $contato->getAll();
$listaemprestimo =$contato->getAllEmprestimos();

?>
<html>
    <head>
        <link rel="stylesheet" href="estilos.php">
    </head>
    <body>


<div>
    <a class="botao-add" href="adicionar.php">ADICIONAR CLIENTE</a>

    <?php
    foreach($listacliente as $cliente):
    ?>

    <ul class="linha-tabela">
        <div class="informações">
        <li ></li></li><a>Cliente: </a> <?=$cliente['name'];?></li>
        <li ><a>Email: </a> <?=$cliente['email'];?></li>
        <li><a>Contato: </a><?=$cliente['telefone'];?></li>
        <li><a>Endereço: </a><?=$cliente['endereco'];?></li>

        </div>
        <div class="botões-editar-excluir">
        <li class="abaixo">
            <a href="editar.php?id=<?=$cliente['id'];?>">
                <img class="imagem" src="src/img/dollar.png">
            </a>
            <a href="editar.php?id=<?=$cliente['id'];?>">
                <img class="imagem" src="src/img/editar(1).png">
            </a>
            
            <a href="remover.php?id=<?=$cliente['id'];?>" 
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
<div>
    <p>PERTO DA DATA DE PAGAMENTO</p>
    <?php
    foreach($lista as $cliente):
    $date1=date_create(date('Y/m/d'));
    $date2=date_create($cliente['datapagar']);
    $diff=date_diff($date1,$date2);

    if($date2 > $date1){
            $cont++;
        ?>
    <ul class="linha-tabela">
        <li >
            <a>Cliente:</a><?=$cliente['name'];?>
            <a> || Dias para pagar:
        </a> <?=$diff->format("%a")?></li>
    </div>
    </ul>
    <?php
        }
    endforeach;
    if($cont == 0){
        ?>
        <li class="linha-tabela">
            <a> Nenhum cliente no momento</a>
        </li>
        <?php
    }
    ?>

<p>ATRASADOS</p>
    <?php
    foreach($lista as $cliente):
    $date1=date_create(date('Y/m/d'));
    $date2=date_create($cliente['datapagar']);
    $diff=date_diff($date1,$date2);
    if($date2<$date1){
    ?>
    <ul class="linha-tabela">
        <li >
            <a>Cliente:</a><?=$cliente['name'];?>
            <a>|| Dias de atraso:</a> <?=$diff->format("%a")?>
        </li>
    </div>
    </ul>
    <?php
    }else if($date1 == $date2){
    ?>
    <ul class="linha-tabela">
        <li >
            <a>Cliente:</a><?=$cliente['name'];?>
            <a>|| Ultimo dia é hoje </a>
        </li>
    </div>
    </ul>
    <?php }endforeach?>
</div>
</body>
</html>