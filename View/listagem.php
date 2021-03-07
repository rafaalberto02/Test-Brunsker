<?php

include 'Controller/Controller.php';

$valores = Controller::listarLinhasTabela();

?>

<link rel="stylesheet" href="Public/css/listagem.css">

<h2>Lista com todos os Imóveis cadastrados</h2>

<table>
    <thead>
        <tr>
            <th>Endereco</th>
            <th>Quartos</th>
            <th>Vagas</th>
            <th>Suites</th>
            <th>Área(m²)</th>
            <th>Valor</th>
            <th>Opções</th>
        </tr>
    </thead>

    <tbody>
        <?= $valores ?>
    </tbody>

</table>