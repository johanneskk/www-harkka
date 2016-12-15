<?php
session_start();


require_once("utils.php");


//inserts user id and score to the database
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    
    
    
    $db = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password) or die("cannot open the database");

    $stmt = $db->prepare("INSERT INTO scores(uid, score) VALUES(:f1,:f2)");

    $stmt->bindParam(":f1", $_SESSION["id"]);
    $stmt->bindParam(":f2", $_POST["score"]);
    //$stmt->debugDumpParams(":f2");
    $stmt->execute();



?>
