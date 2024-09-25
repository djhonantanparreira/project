<?php
// Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'projeto_base');
define('DB_USER', 'root');
define('DB_PASS', '');

function getConnection()
{
    try {
        $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die('Erro de conexão com o banco de dados: ' . $e->getMessage());
    }
}
