<?php
    if (isset($_POST['login'])) {
        if (($_POST['login'] == "moi") && ($_POST['password'] == "1234")) {
            //echo "Identification OK!";
            session_start();
            $_SESSION['connected'] = true;
            //var_dump($_SESSION); exit;
            header("Location: commandes.php");
            exit;
        } else {
            echo "Identification NOK !";
        }
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
    <form action="login.php" method="post">
        <label for="login">Login</label>
        <input id="login" name="login" type="text">
        <label for="password">Password</label>
        <input id="password" name="password" type="password">
        <input type="submit" value="Connecter">
    </form>
</body>
</html>