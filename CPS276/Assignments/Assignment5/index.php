<?php
    include_once 'dircreator.php';
    $mkdir = new directories();
    $status = $mkdir->makeDirectory();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>mkdir example</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="margin:30px;">
        <h1>File and Directory Assignment</h1>
        <h5>Enter a name for your folder and some contents for the file that will be created under it. Use alphanumeric characters only.</h5>
        <br>
        <?php echo($status);?>
        <br>
        <div>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="nameInput" class="form-label" value="">Folder Name</label>
                    <input type="text" class="form-control" name="dirName" aria-describedby="dirName">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fileInput">File Contents</label>
                    <textarea rows="5" class="form-control" name="fileInput" aria-describedby="fileInput"></textarea>
                </div>
                <input type="submit" name = 'submitButton' value = "Submit" class="btn btn-primary"></button>
            </form>
        </div>
        <hr>
        Form built with <a href="https://getbootstrap.com/">Bootstrap</a>.
        <br>
        <a href="../">Go Back</a>
    </body>
</html>