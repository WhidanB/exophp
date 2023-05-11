<?php

if ($_POST) {
    if (
        isset($_POST['email'])
    ) {
        require_once("connect.php");
        $id = strip_tags($_POST['id']);
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        $email = strip_tags($_POST['email']);

        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':first_name', $first_name, PDO::PARAM_STR_CHAR);
        $query->bindValue(':last_name', $last_name, PDO::PARAM_STR_CHAR);
        $query->bindValue(':email', $email);

        $query->execute();
        $result = $query->fetch();
        require_once('close.php');
        header('Location: users.php');
    }
}

$_GET["id"];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once("connect.php");

    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();
    require_once('close.php');
} else {
    header('Location: users.php');
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
    <h1>Edit user </h1>
    <form method="post">
        <div>
            <input type="hidden" value="<?= $result['id'] ?>" name="id" required>
            <label for="first_name">First name</label>
            <input type="text" value="<?= $result['first_name'] ?>" name="first_name" required>
            <label for="last_name">Last name</label>
            <input type="text" value="<?= $result['last_name'] ?>" name="last_name" required>
            <label for="email">email</label>
            <input type="text" value="<?= $result['email'] ?>" name="email" required>
        </div>
        <input type="submit" value="send">
    </form>
</body>

</html>