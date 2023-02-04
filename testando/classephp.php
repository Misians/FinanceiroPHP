<?php
class Cliente {
    private $nome;
    private $idade;

    public function andar(){
        echo "andar";
    }
}
$cliente = new Cliente();
$cliente->$nome = "Misia";

echo "o nome do meu cliente eh: ".$cliente->$nome;