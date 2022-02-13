<?php

function openDatabase() {
    try {
        return $conn = new PDO('mysql:host=localhost;dbname=crud_db', "root", "mysql");
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}