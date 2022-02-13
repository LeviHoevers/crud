<?php

    require "connection.php";
    require "functions.php";

    $id = $_GET["id"];
    $user = userById($id);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $location = $_POST["location"];

        if(!empty($username) && !empty($location)){
            updateUser($username, $location, $id);
        }
        else{
            echo "<h1>both fields are required</h1>";
        }
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update</title>
</head>
<body>
    <form action="update.php" method="POST">
        <h1>Update</h1>
        <p>naam: </p><input value="<?= $user["username"] ?>" type="text" name="username"><br>
        <p>locatie: </p><input value="<?= $user["location"] ?>" type="text" name="location"><br>
        <input class="yellow" value="save changes" type="submit">
    </form>
</body>
</html>