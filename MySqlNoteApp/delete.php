<?php
require_once "connection.php";

$connection = new Connection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $connection->deleteNote($_POST['id']);
    header("Location: index.php");
}