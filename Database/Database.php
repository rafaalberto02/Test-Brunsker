<?php

include 'Connection/Connection.php';
use \PDOException;

class Database {

    private $table;
    private $connection;

    public function __construct($table = null) {
        $this->table = $table;
        $this->connection = Connection::getConnection();
    }

    public function insert($values) {
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null) {
        $where = strlen($where) ? 'WHERE ' . $where : '';

        $query = 'SELECT * FROM ' . $this->table . ' ' . $where;


        return $this->execute($query);
    }

    public function update($where, $values) {
        $fields = array_keys($values);

        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        $this->execute($query);

        return true;
    }

    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
