<?php
require_once 'listFilesProc.php';
$list = createList();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PDF List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="margin:30px;">
        <h1>File List</h1>
        <hr>
        <a href="./index.php" class="link-primary">Add Files</a>
        <br>
        <div>
            <ul>
                <?php
                    echo($list);
                ?>
            </ul>
        </div>
        <hr>
        Page built with <a href="https://getbootstrap.com/">Bootstrap</a>.
        <br>
        <a href="../">Go Back</a>
    </body>
</html>