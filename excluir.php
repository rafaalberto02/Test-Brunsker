<?php

$title = "Excluir Imóvel";

include 'Model/Imovel.php';
include 'Model/Endereco.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php?status=failure');
    exit;
}

Endereco::excluir($_GET['id']);
header('location: index.php?status=success');