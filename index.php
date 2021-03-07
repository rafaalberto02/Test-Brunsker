<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == "success") {
        $mensagem = '
            <div class="success">
                <p>Operação concluída com sucesso</p>
            </div>
        ';
    } else {
        $mensagem = '
        <div class="failure">
            <p>Ocorreu um erro</p>
        </div>
    ';
    };
}

$title = "Locação de Imóveis";

include __DIR__ . '/View/header.php';
include __DIR__ . '/View/listagem.php';
include __DIR__ . '/View/footer.php';
