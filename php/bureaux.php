<?php
session_start();
include("pdo.inc.php");

/*********** Requete SQL pour récupérer tous les bureaux **************/
$sql =  'SELECT officeCode, city, country FROM offices ORDER BY officeCode';
$cursor = $pdo->query($sql);
$data = $cursor->fetchAll();
//var_dump($data);
?>

<!-- Affichage des bureaux -->
<?php include("header.inc.php"); ?>

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

<?php include("footer.inc.php"); ?>
