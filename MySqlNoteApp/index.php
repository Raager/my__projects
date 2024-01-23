<?php
    require_once "connection.php";

    $connection = new Connection();
    $notes = $connection->getNotes();
    $currentNote = [
        'id' => '',
        'title' => '',
        'text' => ''
    ];
    if (isset($_GET['id'])) {
        $currentNote = $connection->getNoteById($_GET['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Note app</title>
</head>
<body class = "container">
    <br>
    <div class = "p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <form class="form-group" action="save.php" method ="post">
            <input type="hidden" name = "id" value="<?php echo $currentNote['id']?>">
            <input class="form-control" type="text" name="title" placeholder="Title..." value="<?php echo $currentNote['title'] ?>">
            <br>
            <input class="form-control" type="text" name="text" placeholder="Text..." value="<?php echo $currentNote['text'];?>">
            <br>
            <button class="btn btn-info"><?php if($currentNote['id']){
                echo 'Update';
             } else { echo 'Submit';} ?></button>
        </form>
    </div>
    <div>
        <?php foreach($notes as $note) { ?>
            <div class = "p-4 p-md-5 mb-4 rounded text-body-emphasis bg-warning">
                <div class = "modal-header border-bottom-0">
                    <blockquote class="blockquote">
                        <a class= "modal-title fs-5" href="?id=<?php echo($note['id']);?>"><?php echo ($note['title']);?></a>
                    </blockquote>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                        <button class = "btn btn-close"></button>
                    </form>
                </div>
                <div class="text"><?php echo ($note['text']);?></div>
                <br>
                <p style="text-align: end;"><small><?php echo ($note['date']);?></small></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>