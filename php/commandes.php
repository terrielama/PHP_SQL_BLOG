<?php
    session_start();
    if (((!isset($_SESSION['connected'])) || ($_SESSION['connected'] != true))) {
        header('Location: login.php');
        exit;
    }

    include("pdo.inc.php");

    var_dump($_POST); 

    /*********** Requete SQL pour récupérer des produits suite à une recherche **************/
    if (!isset($_POST['mini'])) {
        $sql =  "SELECT * 
                    FROM orders 
                ";
        $cursor = $pdo->query($sql);
    } else {
        $sql =  "SELECT * 
                    FROM orders 
                    WHERE orderDate BETWEEN :mini AND :maxi;
                ";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(':mini', $_POST['mini'], PDO::PARAM_STR);
        $cursor->bindValue(':maxi', $_POST['maxi'], PDO::PARAM_STR);
        $cursor->execute();
                    
    }
    
    $data = $cursor->fetchAll();
    //var_dump($data); exit;
    ?>

    <!-- Affichage des produits suite recherche MC -->
    <?php include("header.inc.php"); ?>

    <h2>Hstorique des commandes</h2>

    <form action="commandes.php" method="post">
        <label for="mini">Date mini</label>
        <input id="mini" type="date" name="mini">
        <label for="maxi">Date maxi</label>
        <input id="maxi" type="date" name="maxi">
        <input type="submit" value="Filtrer">
    </form>

    <table border="1">
        <tr>
            <th>Numéro</th>
            <th>Date</th>
            <th>Statut</th>
            <th>Expédition</th>
        </tr>
        <?php foreach ($data as $value) { ?>
            <tr>
                <td><?= $value["orderNumber"] ?></td>
                <td><?= $value["orderDate"] ?></td>
                <td><?= $value["status"] ?></td>
                <td><?= $value["shippedDate"] ?></td>
            </tr>
        <?php } ?>
    </table>

    <?php include("footer.inc.php"); ?>
