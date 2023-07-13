<?php
namespace App\Controllers;
use Database\MySQLi\DatabaseConnection;

class UsersController{
    
    public function execute_query($query,$parameters = []){
        $database = 'task-manager';
        $server = 'localhost';
        $username = 'root';
        $password = '';

        $db = new DatabaseConnection($server,$username,$password,$database);

        $db -> connect();

        $statement = $db -> getConnection() -> prepare($query);
        $statement -> execute($parameters);
        $results = $statement -> get_result();
        return $results;
    }
    
    public function login($data){

        $query = "SELECT userID FROM users WHERE username = ? and password = ?";
        
        $results = $this -> execute_query($query,[$data['username'],$data['password']]);

        $count = mysqli_num_rows($results);

        if ($count == 1){
            $row = $results->fetch_assoc();
            $_SESSION['userID'] = $row['userID'];
            header("location: index.php");
        } else {
            echo "The user and/or password are incorrect.";
        }
    }

    public function store($data){

        $query = "INSERT INTO users (username,password,name) 
                    VALUES (?,?,?)";
        $results = $this -> execute_query($query,[$data['username'],$data['password'],$data['name']]);

        if(empty($results)){
            header("location: login.php");
        } else {
            echo "Algo ha salido mal";
        }
    }

    public function show($data){

        $query = "SELECT * FROM users WHERE userID = ?";
        
        $results = $this -> execute_query($query,[$data["userID"]]);

        if (!empty($results)){
            while($row = $results->fetch_assoc()){

                echo "
                <h2>Hi, ".$row['name']."!</h2>
                <p>@".$row['username']."</p>
                <a href='logout.php'><p>Log Out</p></a>";
            }
        } else {
            echo "Algo ha salido mal";
        }
    }

    public function edit(){

    }

    public function update($data){

        $query = "UPDATE users
                    SET username = ?,password = ?, name = ? 
                    WHERE userID = ?";
        $results = $this -> execute_query($query,[$data['username'],$data['password'],$data['name'],$data['userID']]);

        if(empty($results)){
            echo "El registro se ha actualizado con éxito.";
        } else {
            echo "Algo ha salido mal";
        }
    }

    public function destroy($data){

        $query = "DELETE FROM users
                    WHERE userID = ?";
        $results = $this -> execute_query($query,[$data['userID']]);

        if(empty($results)){
            echo "El registro se ha eliminado con éxito.";
        } else {
            echo "Algo ha salido mal";
        }
    }

}

?>