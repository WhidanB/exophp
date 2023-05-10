<?php
require_once("connect.php");

$sql = "SELECT * FROM users WHERE last_name = 'Palmer'";
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
    <title>Liste personnes</title>
</head>

<body>
    <table>

        <thead>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>gender</th>
            <th>ip_address</th>
            <th>birth_date</th>
            <th>zip_code</th>
            <th>avatar_url</th>
            <th>state_code</th>
            <th>country_code</th>
        </thead>

        <tbody>
            <?php
            //pour chaque résultat de $result, on affiche une ligne dans le tableau
            foreach ($result as $user) {
                // print_r($stagiaire);
            ?>

                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['gender'] ?></td>
                    <td><?= $user['ip_address'] ?></td>
                    <td><?= $user['birth_date'] ?></td>
                    <td><?= $user['zip_code'] ?></td>
                    <td><?= $user['avatar_url'] ?></td>
                    <td><?= $user['state_code'] ?></td>
                    <td><?= $user['country_code'] ?></td>
                </tr>

            <?php
            };

            ?>
        </tbody>
    </table>

</body>

</html>