    <?php
    session_start();
    include("pdo.inc.php");

    //var_dump($_GET);
    //var_dump($_POST);

    /*********** Requete SQL pour récupérer des produits suite à une recherche **************/
    /*
    $sql =  "SELECT * 
                FROM products
                WHERE productDescription LIKE '%" . $_GET["s"] . "%'
                    OR productName LIKE '%" . $_GET["s"] . "%';
            ";
    */
    $sql =  "SELECT * 
                FROM products
                WHERE productDescription LIKE :keyword
                    OR productName LIKE :keyword;
            ";

    //echo $sql;

    //die($sql);
    //$cursor = $pdo->query($sql);
    $cursor = $pdo->prepare($sql);
    $cursor->bindValue(':keyword', '%' . $_GET["s"] . '%', PDO::PARAM_STR);
    $cursor->execute();
    $data = $cursor->fetchAll();
    //var_dump($data);
    ?>

    <!-- Affichage des produits suite recherche MC -->
    <?php include("header.inc.php"); ?>

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

    <?php include("footer.inc.php"); ?>
