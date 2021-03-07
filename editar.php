<?php

$title = "Editar Imóvel";

include 'Controller/Controller.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$imovel = Imovel::buscarId($_GET['id']);
$endereco = Endereco::buscarId($imovel->idEndereco);

if (isset(
    $_POST['cep'],
    $_POST['uf'],
    $_POST['cidade'],
    $_POST['bairro'],
    $_POST['logradouro'],
    $_POST['numero'],
    $_POST['complemento'],
    $_POST['qtdQuartos'],
    $_POST['qtdVagas'],
    $_POST['qtdSuites'],
    $_POST['area'],
    $_POST['valor']
)) {
    Controller::atualizar($endereco->id, $imovel->id, $_POST);
}

include __DIR__ . '/View/header.php';
include __DIR__ . '/View/formulario.php';
include __DIR__ . '/View/footer.php';
