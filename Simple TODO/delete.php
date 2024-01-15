<?php
if($_POST['todo_name']){
    if(file_exists('todo.json')){
        $todoArray = json_decode(file_get_contents('todo.json'), true);
    } else {
        $todoArray = [];
    }
    unset($todoArray[$_POST['todo_name']]);
    file_put_contents('todo.json', json_encode($todoArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');