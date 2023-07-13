<?php 
    use App\Controllers\UsersController;
    require "../vendor/autoload.php";

    session_start();

    if (!isset($_SESSION['userID'])){
        header("location: login.php");
        die();
    }

    

    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <main>
            <h1>Task Manager</h1>
            <?php 
                $user = new UsersController;

                $user -> show(["userID"=>$_SESSION['userID']]);
            ?>
        </main>
    </body>
</html>