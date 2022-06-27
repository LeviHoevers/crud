<?php

    require "connection.php";
    require "functions.php";

    if(isset($_GET["delete"])){
        $id = $_GET["delete"];
        deleteUser($id);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $location = $_POST["location"];

        if(!empty($username) && !empty($location)){
            createUser($username, $location);
        }
        else{
            echo "<h1>both fields are required</h1>";
        }
    }

    $users = getUsers();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud</title>
</head>
<body>

    <form action="index.php" method="POST">
        <h1>Create User</h1>
        <p>Naam: </p><input placeholder="username" name="username" type="text"><br>
        <p>Locatie: </p><input placeholder="location" name="location" type="text"><br>
        <input value="create" type="submit">
    </form>

    <?php foreach($users as $currentUser){ ?>
        <div>
            <?= "<h1>" . $currentUser["username"] . "</h1>"?>
            <?= "<p>id: <span>" . $currentUser["id"] . "</span></p>"?>
            <?= "<p>locatie: <span>" . $currentUser["location"] . "</span></p>"?>
            <a class="green" href="update.php?id=<?= $currentUser["id"]?>">Update</a>
           <a class="red" href="index.php?delete=<?= $currentUser["id"]?>">Delete</a>
        </div>
    
    <?php }?>
</body>
</html>