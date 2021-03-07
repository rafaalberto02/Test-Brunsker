<?php

include 'Database/Database.php';

class Imovel {

	public $id;
	public $idEndereco;
	public $valor;
	public $qtdQuartos;
	public $qtdVagas;
	public $qtdSuites;
	public $area;

	private $database;

	public function __construct() {
		$this->database = new Database('Imovel');
	}

	public function inserir() {

		$this->id = $this->database->insert([
			'idEndereco' => $this->idEndereco,
			'valor' => $this->valor,
			'qtdQuartos' => $this->qtdQuartos,
			'qtdVagas' => $this->qtdVagas,
			'qtdSuites' => $this->qtdSuites,
			'area' => $this->area
		]);

		return true;
	}

	public function buscar($where = null, $order = null, $fields = '*') {
		return $this->database->select($where, $order, $fields)->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	public static function buscarId($id) {
		return (new Imovel)->database->select($id)->fetchObject(self::class);
	}

	public function atualizar() {
		return $this->database->update('id = ' . $this->id, [
			'idEndereco' => $this->idEndereco,
			'valor' => $this->valor,
			'qtdQuartos' => $this->qtdQuartos,
			'qtdVagas' => $this->qtdVagas,
			'qtdSuites' => $this->qtdSuites,
			'area' => $this->area
		]);
	}
}
