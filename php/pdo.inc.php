<?php
    /********** Connexion PDO *************/
    $user = "root";
    $pass = "";
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=next_2025_data', $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // tenter de réessayer la connexion après un certain délai, par exemple
        die("Erreur : " . $e->getMessage());
    }
?>
