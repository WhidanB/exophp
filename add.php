<?php

if ($_POST) {
    if (
        isset($_POST['first_name'])
        && isset($_POST['last_name'])
        // && isset($_POST['last_name'])
        // && isset($_POST['last_name'])
        // && isset($_POST['last_name'])
        // && isset($_POST['last_name'])
        // && isset($_POST['last_name'])
        // && isset($_POST['last_name'])
    ) {
        // print_r($_POST);
        require_once('connect.php');
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        $email = strip_tags($_POST['email']);
        $gender = strip_tags($_POST['gender']);
        $ip_address = strip_tags($_POST['ip_address']);
        $birth_date = strip_tags($_POST['birth_date']);
        $zip_code = strip_tags($_POST['zip_code']);
        $avatar_url = strip_tags($_POST['avatar_url']);
        $state_code = strip_tags($_POST['state_code']);
        $country_code = strip_tags($_POST['country_code']);

        $sql = "INSERT INTO users (first_name, last_name, email, gender, ip_address, birth_date, zip_code, avatar_url, state_code, country_code) VALUES (:first_name, :last_name, :email, :gender, :ip_address, :birth_date, :zip_code, :avatar_url, :state_code, :country_code)";
        $query = $db->prepare($sql);
        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':email', $email);
        $query->bindValue(':gender', $gender);
        $query->bindValue(':ip_address', $ip_address);
        $query->bindValue(':birth_date', $birth_date);
        $query->bindValue(':zip_code', $zip_code);
        $query->bindValue(':avatar_url', $avatar_url);
        $query->bindValue(':state_code', $state_code);
        $query->bindValue(':country_code', $country_code);
        $query->execute();
        require_once('close.php');
        header("Location: user.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <h1>Ajouter un stagiaire</h1>
    <form method="post">
        <div>
            <label for="first_name">First name</label>
            <input type="text" name="first_name" required>
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" required>
            <label for="email">email</label>
            <input type="text" name="email" required>
            <label for="gender">gender</label>
            <input type="text" name="gender" required>
            <label for="ip adress">ip adress</label>
            <input type="text" name="ip adress" required>
            <label for="birth date">birth date</label>
            <input type="text" name="birth date" required>
            <label for="zip code">zip code</label>
            <input type="text" name="zip code" required>
            <label for="avatar url">avatar url</label>
            <input type="text" name="avatar url">
            <label for="state code">state code</label>
            <input type="text" name="state code>
            <label for=" country code">country code</label>
            <input type="text" name="country code" required>
        </div>
        <input type="submit" value="send">
    </form>
</body>

</html>