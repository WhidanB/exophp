<?php
require("connect.php");

$sql = "SELECT DISTINCT (country_code) FROM users WHERE country_code LIKE 'N%' ORDER BY `users`.`country_code` ASC";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('close.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste pays</title>
</head>

<body>
    <table>

        <thead>

            <th>country_code</th>
        </thead>

        <tbody>
            <?php
            //pour chaque résultat de $result, on affiche une ligne dans le tableau
            foreach ($result as $user) {
                // print_r($stagiaire);
            ?>

                <tr>

                    <td><?= $user['country_code'] ?></td>
                </tr>

            <?php
            };

            ?>
        </tbody>
    </table>

    <?php
    require("connect.php");

    $sql = "SELECT country_code, COUNT(*) FROM users GROUP BY country_code ORDER BY COUNT(*) DESC";
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // print_r($result);
    require_once('close.php');

    ?>

    <table>
        <thead>
            <th>Country</th>
            <th>Count</th>
        </thead>

        <tbody>
            <?php
            foreach ($result as $result) {
            ?>
                <tr>

                    <td><?= $result['country_code'] ?></td>
                    <td><?= $result['COUNT(*)'] ?> </td>
                </tr>

            <?php

            }
            ?>

        </tbody>
    </table>



</body>

</html>