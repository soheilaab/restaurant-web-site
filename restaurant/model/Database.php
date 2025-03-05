<?php
require 'settingDB.php';

class Database {
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct($host = '', $db = '', $user = '', $password = '') {
        global $settingDB;
        $this->host = $host ? $host : $settingDB['host'];
        $this->db = $db ? $db : $settingDB['db'];
        $this->user = $user ? $user : $settingDB['user'];
        $this->password = $password ? $password : $settingDB['password'];
    }

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=UTF8";
        try {
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
?>
