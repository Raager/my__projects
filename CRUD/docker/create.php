<?php
ob_start();
include "partials/header.php";
require "users/users.php";

$user = [
    "id" => "",
    "name" => "",
    "username" => "",
    "phone" => "",
    "email" => "",
    "website" => ""
];

$errors = [
    "name" => "",
    "username" => "",
    "phone" => "",
    "email" => "",
    "website" => ""
];

$isValid = true;


if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);
    
    if($isValid) {
        $user = createUser($_POST);
        uploadImage($_FILES['picture'], $user);
    
        header("Location: index.php");
    }
}
ob_end_flush();
?>

<?php include "_form.php";?>

<?php include "partials/footer.php";?>