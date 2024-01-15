<?php
require 'users/users.php';
$users = getUsers();

include 'partials/header.php';

?>

    <div class="container">
        <p></p>
        <p>
            <a class="btn btn-outline-success" href="create.php">Create user</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($users as $user) { ?>
                    <td><?php if(isset($user['extension'])){ ?>
                        <img style="width: 50px" src="<?php echo "users/images/{$user['id']}.{$user['extension']}"?>" alt="">
                    <?php } ?>
                </td>
                    <td><?php echo ($user["name"]) ?></td>
                    <td><?php echo ($user["username"]) ?></td>
                    <td><?php echo ($user["email"]) ?></td>
                    <td><?php echo ($user["phone"]) ?></td>
                    <td><a href="https://<?php echo ($user["website"]) ?>"><?php echo ($user["website"]) ?></a></td>
                    <td>
                        <a href="view.php?id=<?php echo $user["id"] ?>" class ="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php?id=<?php echo $user["id"] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                        <form method="POST" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo($user['id']);?>">
                            <button  class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php include "partials/footer.php";?>