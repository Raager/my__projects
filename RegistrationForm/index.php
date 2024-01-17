<?php
define('FORM_IS_EMPTY', 'This form is empty');
$isValid = true;

$username = '';
$email = '';
$password = '';
$passwordRepeat = '';
$cv_link = '';

$errors = [
    'username' => '',
    'email' => '',
    'password' => '',
    'passwordRepeat' => '',
    'cv_link' => ''
];

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $username = checkField('username');
    $email = checkField('email');
    $password = checkField('password');
    $passwordRepeat = checkField('passwordRepeat');
    $cv_link = checkField('cv_link');

    if(!$username) {
        $errors['username'] = FORM_IS_EMPTY;
        $isValid = false;
    } else if(strlen($username) < 6 || strlen($username) > 20){
        $errors['username'] = 'Username must be greater then 6 and lower then 20';
        $isValid = false;
    }
    if(!$email) {
        $errors['email'] = FORM_IS_EMPTY;
        $isValid = false;
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Wrong email adress';
        $isValid = false;
    }
    if(!$password) {
        $errors['password'] = FORM_IS_EMPTY;
        $isValid = false;
    }
    if(!$passwordRepeat) {
        $errors['passwordRepeat'] = FORM_IS_EMPTY;
        $isValid = false;
    }
    if(strcmp($password, $passwordRepeat)){
        $errors['password'] = "Password and Repeat password are not the same";
        $errors['passwordRepeat'] = "Password and Repeat password are not the same";
        $isValid = false;
    }
    if(!$cv_link) {
        $errors['cv_link'] = FORM_IS_EMPTY;
        $isValid = false;
    } else if(!filter_var($cv_link, FILTER_VALIDATE_URL)){
        $errors['cv_link'] = 'Wrong url adress';
        $isValid = false;
    }

    if($isValid) {
        header("Location: registred.php");
    }

}

function checkField($name){
    if(!isset($_POST[$name])){
        return false;
    }

    return htmlspecialchars(stripslashes($_POST[$name]));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 20px">
    <h1 style="margin: 15px" align="center">Registration</h1>
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control <?php echo $errors['username'] ? 'is-invalid' : ''; ?>" 
                    name="username" value="<?php echo $username;?>">
                    <div class="invalid-feedback"><?php echo($errors['username']);?></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control <?php echo $errors['email'] ? 'is-invalid' : ''; ?>" 
                    name="email" value="<?php echo $email;?>">
                    <div class="invalid-feedback"><?php echo($errors['email']);?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control <?php echo $errors['password'] ? 'is-invalid' : ''; ?>" 
                    name="password" value="<?php echo $password;?>">
                    <div class="invalid-feedback"><?php echo($errors['password']);?></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Repeat password</label>
                    <input type="password" class="form-control <?php echo $errors['passwordRepeat'] ? 'is-invalid' : ''; ?>" 
                    name="passwordRepeat" value="<?php echo $passwordRepeat;?>">
                    <div class="invalid-feedback"><?php echo($errors['passwordRepeat']);?></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>CV link</label>
            <input type="text" class="form-control <?php echo $errors['cv_link'] ? 'is-invalid' : ''; ?>" 
            name="cv_link" value="<?php echo $username;?>">
            <div class="invalid-feedback"><?php echo($errors['cv_link']);?></div>
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-info">Submit</button>
        </div>
    </form>
</body>
</html>