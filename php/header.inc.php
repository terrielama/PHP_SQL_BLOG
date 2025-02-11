<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="bureaux.php">Bureaux</a></li>
            <li><a href="commandes.php">Commandes</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>

            <!--<li><a href="recherche.php">Recherche</a></li>-->
        </ul>
        <form action="recherche.php" method="get">
            <input type="text" name="s" required>
            <input type="submit" value="Rechercher">
        </form>
    </nav>