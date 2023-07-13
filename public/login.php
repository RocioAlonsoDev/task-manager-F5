<?php 
    use App\Controllers\UsersController;
    require "../vendor/autoload.php";

    session_start();

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
            
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);
        
        $user = new UsersController;

        $user -> login([
            "username" => "$username",
            "password" => "$password"
        ]);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <main>
        <h1>Task Manager</h1>
        <form action="" method="POST">
            <input type="text" placeholder="username" name="username" required>
            <input type="password" placeholder="password" name="password" required>
            <input type="submit" value="Enter">
            <a href="src/pages/sign-up.php">
                <p>Don't have an account yet? Sign up here.</p>
            </a>
        </form>
    </main>
</body>
</html>




