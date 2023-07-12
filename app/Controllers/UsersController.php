<?php
namespace App\Controllers;
use Database\MySQLi\DatabaseConnection;

class UsersController{
    public function index(){

    }
    public function create(){

    }
    public function store($data){
        $database = 'task-manager';
        $server = 'localhost';
        $username = 'root';
        $password = '';

        $db = new DatabaseConnection($server,$username,$password,$database);
        $db -> connect();
        $query = "INSERT INTO users (username,password,name) 
                    VALUES (?,?,?)";
        $results = $db -> execute_query($query,[$data['username'],$data['password'],$data['name']]);
        print_r($results);

        if(!empty($results)){
            echo "El registro se ha realizado con éxito.";
        } else {
            echo "Algo ha salido mal";
        }
    }
    public function show(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }

}

?>