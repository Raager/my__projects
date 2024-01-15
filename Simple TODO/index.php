<?php

$todoArray = [];

if(file_exists('todo.json')){
    $todoArray = json_decode(file_get_contents("todo.json"), true);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
</head>
<body>
    <form action="newTodo.php" method="POST">
        <input type="text" name="todo_name"placeholder="Enter your todo"></input>
        <button>Submit</button>
    </form>
    <br>
        <?php foreach($todoArray as $todoName => $todo){?>
            <div>
                <form style="display: inline" action="change_status.php" method="POST">
                    <input type="hidden" name="todo_name" value="<?php echo ($todoName);?>">
                    <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ;?>>
                </form>
                <?php echo $todoName; ?>
                <form style="display: inline" action="delete.php" method="POST">
                    <input type="hidden", name="todo_name" value="<?php echo($todoName);?>">
                    <button>Delete</button>
                </form>
            </div>
        <?php }?>
        <script>
            const checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(ch => {ch.onclick = function(){
                this.parentNode.submit();
            };
        })
        </script>
</body>
</html>