<?php
require_once("connect.php");

$sql = "SELECT * FROM `users` WHERE `email` LIKE '%google%' ";
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
    <title>Liste mail google</title>
</head>

<body>
    <table>

        <thead>

            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
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
                    <td><?= $user['email'] ?></td>

                </tr>

            <?php
            };

            ?>
        </tbody>
    </table>

</body>

</html>