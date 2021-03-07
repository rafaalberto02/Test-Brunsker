<?php

use \PDO;
use \PDOException;

class Connection {

    private const HOST = 'localhost';
    private const NAME = 'locacaoimoveis';
    private const USER = 'root';
    private const PASS = '';

    public $connection;

    public static function getConnection(){
        try {
            $connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
