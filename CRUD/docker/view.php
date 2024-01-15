<?php
include 'partials/header.php';
require "users/users.php";

if(!isset($_GET['id'])){
    include 'partials/not_found.php';
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);

if(!$user){
    include 'partials/not_found.php';
    exit;
}
?>

<div class="card">
    <div class="card-header">
        <h3>View user: <?php echo($user['name'])?></h3>
        <a class="btn btn-sm btn-secondary" href="update.php?id=<?php echo ($user['id'])?>">Update</a>
        <form style="display: inline-block" method="POST" action="delete.php">
            <input type="hidden" name="id" value="<?php echo($user['id']);?>">
            <button  class="btn btn-sm btn-danger">Delete</button>
        </form>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th>Name:</th>
                <td><?php echo($user['name']); ?></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?php echo($user['username']); ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo($user['email']); ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?php echo($user['phone']); ?></td>
            </tr>
            <tr>
                <th>Website:</th>
                <td><a href="https://<?php echo ($user["website"]) ?>"><?php echo ($user["website"]) ?></a></td>
            </tr>
        </tbody>
    </table>
</div>
<?php include "partials/footer.php";?>