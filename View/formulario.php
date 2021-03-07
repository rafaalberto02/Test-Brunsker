<link rel="stylesheet" href="Public/css/formulario.css">
<script src="Public/js/formulario.js"></script>

<form method="post">

    <h2>Localização</h2>

    <label for="cep">CEP:</label>
    <input value="<?= $endereco->cep ?>" id="cep" value="" type="text" name="cep" maxlength="9" placeholder="12345-000" onblur="preencherCep(this.value);" required ><br>
    <label for="uf">UF:</label>
    <input id="uf" name="uf" type="text" required value="<?= $endereco->uf ?>"><br>
    <label for="cidade">Cidade:</label>
    <input id="cidade" name="cidade" type="text" required value="<?= $endereco->cidade ?>"><br>
    <label for="bairro">Bairro:</label>
    <input id="bairro" name="bairro" type="text" required value="<?= $endereco->bairro ?>"><br>
    <label for="logradouro">Logradouro:</label>
    <input id="logradouro" name="logradouro" type="text" required value="<?= $endereco->logradouro ?>"><br>
    <label for="numero">Numero:</label>
    <input id="numero" name="numero" type="number" min="0" required value="<?= $endereco->numero ?>"><br>
    <label for="complemento">Complemento:</label>
    <input id="complemento" name="complemento" type="text" value="<?= $endereco->complemento ?>"><br>

    <h2>Especificações</h2>

    <label for="qtdQuartos">Quantidade de Quartos:</label>
    <input type="number" name="qtdQuartos" id="qtdQuartos" min="0" required value="<?= $imovel->qtdQuartos ?>"><br>
    <label for="qtdVagas">Quantidade de Vagas:</label>
    <input type="number" name="qtdVagas" id="qtdVagas" min="0" required value="<?= $imovel->qtdVagas ?>"><br>
    <label for="qtdSuites">Quantidade de Suites:</label>
    <input type="number" name="qtdSuites" id="qtdSuites" min="0" required value="<?= $imovel->qtdSuites ?>"><br>
    <label for="area">Area do imóvel (m²):</label>
    <input type="number" name="area" id="area" step="0.1" min="0" required value="<?= $imovel->area ?>"><br>
    <label for="valor">Valor do aluguel:</label>
    <input type="number" name="valor" id="valor" min="0" required required value="<?= $imovel->valor ?>"><br>

    <input type="submit" value="Enviar">
</form>