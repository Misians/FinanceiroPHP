<?php
require 'config.php';
include 'contato.class.php';
$contato = new Contato();
$lista = [];
$clientenumero = 0;
$totalareceber = 0;
$totalrecebido = 0;

$lista = $contato->getAll();
?>
<html>
    <head>
        <link rel="stylesheet" href="estilos.php">
    </head>
    <body >
    <?php
    foreach($lista as $cliente){
        $totalareceber = $totalareceber + $cliente['divida'];
        $clientenumero++;
        $totalrecebido = $totalrecebido + $cliente['quitado'];
    }?>
    <a href='#'>HOME</a>
    <a href="gerenciarclientes.php?">GERENCIAR CLIENTES</a>
    <a href='#'>CALENDÁRIO</a>
    <a href='#'>EXTRATO</a>
    <p>DADOS GERAIS(TODOS OS ANOS)</p>
    <div class="dadosgerais">
        <div class="quadradinho">
            <a>total de clientes</a>
            <br />
            <a class='num-azul'><?=$clientenumero;?></a>
        </div>
        
        <div class="quadradinho">
            <a>total emprestado </a><br />
            <a class='num-azul'><?=$totalareceber;?></a>
        </div>

        <div class="quadradinho">
            <a>total a receber</a>
            <br />
            <a class='num-azul'><?=$totalareceber - $totalrecebido;?></a>
        </div>
        <div class="quadradinho">
            <a>total a receber</a>
            <br />
            <a class='num-azul'><?=$totalareceber - $totalrecebido;?></a>
        </div>
        <div class="quadradinho">
            <a>total a receber</a>
            <br />
            <a class='num-azul'><?=$totalareceber - $totalrecebido;?></a>
        </div>
        
        
    </div>

</body>
</html>