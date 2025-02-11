<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("header.php"); ?>
    <h1>Bonjour</h1>
    <h2>
        <?php
            $var1 = "WORLD";
            echo "Hello " . $var1 . " !";
        ?>
    </h2>

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

    <?php
    /*********** Requete SQL pour récupérer tous les bureaux **************/
    $sql =  'SELECT officeCode, city, country FROM offices ORDER BY officeCode';
    $cursor = $pdo->query($sql);
    $data = $cursor->fetchAll();
    //var_dump($data);
    ?>

    <!-- Affichage des bureaux -->
    <h2>Liste des bureaux</h2>
    <table border="1">
        <tr>
            <th>Numéro</th>
            <th>Ville</th>
            <th>Pays</th>
        </tr>
        <?php foreach ($data as $value) { ?>
            <tr>
                <td><?= $value["officeCode"] ?></td>
                <td><?= $value["city"] ?></td>
                <td><?= $value["country"] ?></td>
            </tr>
        <?php } ?>
    </table>

    <?php
    /*********** Requete SQL pour récupérer des produits suite à une recherche **************/
    $sql =  "SELECT * 
                FROM products
                WHERE productDescription LIKE '%Ford%'
                    OR productName LIKE '%Ford%';
            ";
    $cursor = $pdo->query($sql);
    $data = $cursor->fetchAll();
    //var_dump($data);
    ?>

    <!-- Affichage des produits suite recherche MC -->
    <h2>Recherche de produits</h2>
    <table border="1">
        <tr>
            <th>Code</th>
            <th>Nom du produit</th>
            <th>MSRP</th>
            <th>Prix</th>
        </tr>
        <?php foreach ($data as $value) { ?>
            <tr>
                <td><?= $value["productCode"] ?></td>
                <td><?= $value["productName"] ?></td>
                <td><?= $value["MSRP"] ?> $</td>
                <td><?= $value["buyPrice"] ?> $</td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>