<?php
/*********** Requete SQL pour récupérer tous les posts actifs **************/
$sql =  'SELECT title, LEFT(content, 150) AS content, lastName, firstName, updatedAt  
            FROM posts A
            INNER JOIN users B
                ON A.id_users = B.id
            WHERE active = 1';
$cursor = $pdo->query($sql);
$data = $cursor->fetchAll();