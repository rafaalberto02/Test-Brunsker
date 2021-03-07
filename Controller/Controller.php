<?php

include 'Model/Endereco.php';
include 'Model/Imovel.php';

class Controller {

    public static function inserir($atributos) {
        $endereco = (new Controller)->criarObjetoEndereco($atributos);

        if ($endereco->inserir()) {
            $imovel = (new Controller)->criarObjetoImovel($atributos);
            $imovel->idEndereco = $endereco->id;

            if ($imovel->inserir()) {
                header('location: index.php?status=success');
                exit;
            }
        }

        header('location: index.php?status=failure');
        exit;
    }

    public static function atualizar($idEndereco, $idImovel, $atributos) {
        $endereco = (new Controller)->criarObjetoEndereco($atributos);
        $endereco->id = $idEndereco;

        if ($endereco->atualizar()) {
            $imovel = (new Controller)->criarObjetoImovel($atributos);
            $imovel->id = $idImovel;
            $imovel->idEndereco = $endereco->id;

            if ($imovel->atualizar()) {
                header('location: index.php?status=success');
                exit;
            }
        }

        header('location: index.php?status=failure');
        exit;
    }

    public static function listarLinhasTabela() {
        $valores = "";
        $imoveis = (new Imovel)->buscar();

        foreach ($imoveis as $imovel) {
            $valores .= '
            <tr>
                <td>' . (new Endereco)->buscarId($imovel->idEndereco)->toString() . '</td>
                <td>' . $imovel->qtdQuartos . '</td>
                <td>' . $imovel->qtdVagas . '</td>
                <td>' . $imovel->qtdSuites . '</td>
                <td>' . $imovel->area . '</td>
                <td>' . $imovel->valor . '</td>
                <td>
                    <a href="editar.php?id=' . $imovel->id . '">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                    <a href="excluir.php?id=' . $imovel->id . '">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>
            </tr>';
        }

        $valores = strlen($valores) ? $valores : '
        <tr>
            <td colspan="7">
                Nenhum imóvel encontrado
            </td>
        </tr>';

        return $valores;
    }

    private function criarObjetoImovel($atributos) {
        $imovel = new Imovel;

        $imovel->qtdQuartos = $_POST["qtdQuartos"];
        $imovel->qtdVagas = $_POST["qtdVagas"];
        $imovel->qtdSuites = $_POST["qtdSuites"];
        $imovel->area = $_POST["area"];
        $imovel->valor = $_POST["valor"];

        return $imovel;
    }

    public function criarObjetoEndereco($atributos) {
        $endereco = new Endereco;

        $endereco->cep = $atributos['cep'];
        $endereco->uf = $atributos['uf'];
        $endereco->cidade = $atributos['cidade'];
        $endereco->bairro = $atributos['bairro'];
        $endereco->logradouro = $atributos['logradouro'];
        $endereco->numero = $atributos['numero'];
        $endereco->complemento = $atributos['complemento'];

        return $endereco;
    }
}
