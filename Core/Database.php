<?php

namespace Core;

use PDO;



class Database

{

    // Making $connection var to save connection like door key
    public $connection;
    // extract statment in var to wrap it with custom functions
    public $statement;
    // construct get connection whatever Database class use instance
    public function __construct($config, $username = 'root', $password = '')
    {
        // dns string contain config  info
        $dns = 'mysql:' . http_build_query($config, '', ';');
        // start using connection with config vars with fetching as assoc 
        $this->connection = new PDO($dns, $username, $password, [
            PDO::FETCH_ASSOC
        ]);
    }
    // Function to use prepare and execute with optionsd [params]
    public function query($query, $params = [])
    {
        //Prepares an SQL statement to be executed by the PDOStatement::execute() method
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        // return in Database instance (statement,connection)
        return $this;
    }

    public function findOrFail()
    {
        $result = $this->statement->fetch();
        if (!$result) {
            // abort();
        }
        return  $result;
    }
    public function findAll()
    {
        $result = $this->statement->fetchAll();
        if (!$result) {
            //abort();
        }
        return  $result;
    }
}
