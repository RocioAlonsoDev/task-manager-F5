<?php 
use App\Controllers\UsersController;
require "vendor/autoload.php";

$users = new UsersController;

// $users -> store([
//     "username" => "prueba",
//     "password" => "123456",
//     "name" => "Usuario Prueba"
// ]);

$users -> update([
    'username'=>'pruebaupdate',
    'password'=>'654321',
    'name'=>'pruebaupdate',
    'userID'=>'1'
]);



?>