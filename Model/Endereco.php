<?php

class Endereco {

	public $id;
	public $cep;
	public $logradouro;
	public $complemento;
	public $bairro;
	public $cidade;
	public $uf;
	public $numero;

	private $database;

	public function __construct() {
		$this->database = new Database('Endereco');
	}

	public function inserir() {
		$this->id = $this->database->insert([
			'cep' => $this->cep,
			'logradouro' => $this->logradouro,
			'complemento' => $this->complemento,
			'bairro' => $this->bairro,
			'cidade' => $this->cidade,
			'numero' => $this->numero,
			'uf' => $this->uf
		]);

		return true;
	}

	public static function buscarId($id) {
		return (new Endereco)->database->select($id)->fetchObject(self::class);
	}

	public function atualizar() {
		return $this->database->update('id = ' . $this->id, [
			'cep' => $this->cep,
			'logradouro' => $this->logradouro,
			'complemento' => $this->complemento,
			'bairro' => $this->bairro,
			'cidade' => $this->cidade,
			'numero' => $this->numero,
			'uf' => $this->uf
		]);
	}

	public static function excluir($id) {
		return (new Endereco)->database->delete("id = " . $id);
	}

	public function toString() {
		return $this->cep . ', ' . $this->logradouro . ', ' .  $this->numero . ', ' . $this->complemento  . ', ' . $this->bairro . ', ' . $this->cidade . ', ' . $this->uf;
	}
}
