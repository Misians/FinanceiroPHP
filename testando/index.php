<?php
include 'contato.class.php';

$contato = new Contato();

$nome = $contato->excluir('aaaa@gmail.com');