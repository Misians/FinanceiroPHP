<?php
$pdo = new PDO("mysql:dbname=react-crud;host=localhost","root", "");

$sql = $pdo->query('SELECT * FROM clientes');
$dados = $sql->fetchAll();
echo '<pre>';
print_r($dados);