<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="Public/css/header.css">
    <title><?php echo $title; ?></title>
</head>

<body>

    <div class="container">
        <header>
            <div class="icon"><i class="fas fa-building"></i>Locação de Imóveis</div>

            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="cadastrar.php">Cadastrar</a>
                </li>
            </ul>
        </header>

        <?= $mensagem ?>