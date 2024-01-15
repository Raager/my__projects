<?php

$todoName = false;
if($_POST['todo_name']) {
    $todoName = trim($_POST['todo_name']);
}

if($todoName){
    if(file_exists('todo.json')){
        $todoArray = json_decode(file_get_contents('todo.json'), true);
    } else {
        $todoArray = [];
    }
    $todoArray[$todoName] = ['completed' => false];

    file_put_contents('todo.json', json_encode($todoArray, JSON_PRETTY_PRINT));
}
header('Location: index.php');