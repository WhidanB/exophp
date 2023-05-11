<?php
require_once("connect.php");

$sql = "SELECT *, DATEDIFF(DATE(NOW()), STR_TO_DATE(birth_date, '%d/%m/%Y')) as age FROM users";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Age</title>
</head>

<body>



    <table>

        <thead>
            <th>first_name</th>
            <th>last_name</th>
            <th>age</th>
        </thead>

        <tbody>
            <?php
            //pour chaque résultat de $result, on affiche une ligne dans le tableau
            foreach ($result as $user) {
                // print_r($stagiaire);
            ?>

                <tr>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= intval($user['age'] / 365) ?></td>
                </tr>

            <?php
            };

            ?>
        </tbody>
    </table>

    <?php

    $sqlop = "SELECT AVG(DATEDIFF(DATE(NOW()), STR_TO_DATE(birth_date, '%d/%m/%Y'))) as avghommes FROM users WHERE gender = 'Male'";
    $queryop = $db->prepare($sqlop);
    $queryop->execute();
    $resultop = $queryop->fetchAll(PDO::FETCH_ASSOC);



    $sqlop2 = "SELECT AVG(DATEDIFF(DATE(NOW()), STR_TO_DATE(birth_date, '%d/%m/%Y'))) as avgfemmes FROM users WHERE gender = 'Female'";
    $queryop2 = $db->prepare($sqlop2);
    $queryop2->execute();
    $resultop2 = $queryop2->fetchAll(PDO::FETCH_ASSOC);

    require_once('close.php');

    ?>

    <table>
        <thead>
            <th>Hommes</th>
            <th>Femmes</th>
        </thead>
        <tbody>
            <td><?= intval($resultop[0]['avghommes'] / 365) ?></td>
            <td><?= intval($resultop2[0]['avgfemmes'] / 365) ?></td>

        </tbody>
    </table>

</body>

</html>