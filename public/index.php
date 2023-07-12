<?php 
use App\Controllers\UsersController;
require "vendor/autoload.php";

$users = new UsersController;

$users -> store([
    "username" => "prueba",
    "password" => "123456",
    "name" => "Usuario Prueba"
]);

?>