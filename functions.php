<?php

function createUser($user, $location){
    $conn = openDatabase();
    $query = "INSERT INTO users (username, `location`) VALUES (:user, :loc)";
    $result = $conn->prepare($query);
    $result->bindParam(":user", $user);
    $result->bindParam(":loc", $location);
    $result->execute();
}

function getUsers(){
    $conn = openDatabase();
    $query = "SELECT * FROM users";
    $result = $conn->prepare($query);
    $result->execute();
    return $result->fetchall();
}

function deleteUser($id){
    $conn = openDatabase();
    $query = "DELETE FROM users WHERE id=$id";
    $result = $conn->prepare($query);
    $result->execute();
}