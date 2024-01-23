<?php
require_once "connection.php";

$connection = new Connection();

if(!$_POST['id']){
    $connection->setNotes($_POST);
} else {
    $connection->updateNote($_POST);
}
header("Location: index.php");