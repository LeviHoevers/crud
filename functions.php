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
    $query = "DELETE FROM users WHERE id=:id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
}

function userById($id){
    $conn = openDatabase();
    $query = "SELECT * FROM users WHERE id=:id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
    return $result->fetch();
}

function updateUser($username, $loc, $id){
    $conn = openDatabase();
    $query = "UPDATE users username = :username, `location`= :loc WHERE id = :id";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $id);
    $result->bindParam(":username", $username);
    $result->bindParam(":loc", $loc);
    $result->execute();
}