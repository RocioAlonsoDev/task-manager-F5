<?php 

namespace Database\MySQLi;

class DatabaseConnection {
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;
    
    public function __construct($server, $username, $password, $database){
        $this -> server = $server;
        $this -> username = $username;
        $this -> password = $password;
        $this -> database = $database;
    }

    public function connect(){
        $this -> connection = mysqli_connect($this -> server,$this -> username,$this ->password,$this -> database);

        if ($this -> connection -> connect_errno){
            die("Falló la conexión: {$this -> connection -> connect_error}");
        }

        $set_names = $this -> connection -> prepare("SET NAMES 'utf8'");
        $set_names -> execute();
    }

    public function execute_query($query,$parameters = []){
        $statement = $this -> connection -> prepare($query);
        $results = $statement -> execute($parameters);
        return $results;
    }
}
?>