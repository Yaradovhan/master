<?php

/**
 * Class ConnectionMySql
 */
class ConnectionMySql
{
    /**
     * @var mysqli
     */
    protected $connection;

    /**
     * ConnectionMySql constructor.
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(HOST, USER, PASS, DB);
        if (!$this->connection) {
            exec('No connection with DataBase');
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}