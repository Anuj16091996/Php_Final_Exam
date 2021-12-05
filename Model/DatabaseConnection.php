<?php

class DatabaseConnection
{
    private const _serverName = "localhost";
    private const _port = 3307;
    private const _database = "dating";
    private const _username = "project";
    private const _password = "project";
    private const _connectionString = "mysql:host=" . self::_serverName . ";dbname=" . self::_database . ";port=" . self::_port;

    public function GetConnect(): PDO|false
    {
        try {
            $connection = new PDO(self::_connectionString, self::_username, self::_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $exception) {
            echo "Connection Failed: {$exception->getMessage()}";
            die("Connection to DB Failed");
            return false;
        }

    }

    public function CloseConnect()
    {
        $con = $this->GetConnect();
        $con = null;
    }


}
