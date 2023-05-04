<?php
class Database
{
    
    public $connection;

    public function __construct($config)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';'); //mysql:host=<host>;port=<port>;dbname=<database>
        
        $this->connection = new 
        PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}
