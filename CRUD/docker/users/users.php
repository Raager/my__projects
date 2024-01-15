<?php
function getUsers(){
   return json_decode(file_get_contents(__DIR__.'/users.json'), true);
}
function getUserById($id){
    $users = getUsers();
    foreach($users as $user){
        if ($user["id"] == $id){
            return $user;
        }
    }
    return null;
}
function createUser($data){
    $users = getUsers();

    $data['id'] = rand(0 , 999999999);

    $users[] = $data;

    updateJSON($users);

    return $data;

}
function updateUser($data, $id){
    $updateUser = [];
    $users = getUsers();
    foreach($users as $i => $user){
        if ($user["id"] == $id){
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }
    updateJSON($users);
    return $updateUser;
}
function deleteUser($id){
    $users = getUsers();
    foreach($users as $i => $user){
        if($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }
    updateJSON($users);
}

function uploadImage($file, $user){
    if(isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if(!is_dir(__DIR__.'/images')){
            mkdir(__DIR__.'/images');
        }
        $fileName = $file['name'];
        $dotPoint = strpos($fileName, '.');
        $extension = substr($fileName,$dotPoint + 1);
        move_uploaded_file($file['tmp_name'], __DIR__. "/images/{$user['id']}.$extension");
        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function updateJSON($data){
    file_put_contents(__DIR__.'/users.json', json_encode($data, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors){
    $isValid = true;

    if(!$user['name']) {
        $errors['name'] = "please write your name";
        $isValid = false;
    }
    if(!$user['username']){
        $errors['username'] = "please enter your username";
        $isValid = false;
    }
    if(!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $errors['phone'] = "please write your correct phone number";
        $isValid = false;
    }
    if($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "please enter your correct email adres";
        $isValid = false;
    }
    return $isValid;
}