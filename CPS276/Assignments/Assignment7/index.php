<?php
require_once 'fileUploadProc.php';
$status = addFile();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PDF Uploader</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="margin:30px;">
        <h1>PDF Uploader</h1>
        <hr>
        <a href="./list.php" class="link-primary">File List</a>
        <br>
        <br>
        <div>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" value="">File Name</label>
                    <input type="text" class="form-control" name="fileName" aria-describedby="fileName">
                </div>
                <div class="mb-3">
                    <label class="form-label" value=""><?php echo($status) ?></label>
                    <br>
                    <input type="file" class="form-control-file" id= "fileUpload" name="fileUpload">
                </div>
                <input type="submit" name = 'uploadButton' value = "Upload File" class="btn btn-primary"></button>
            </form>
        </div>
        <hr>
        Form built with <a href="https://getbootstrap.com/">Bootstrap</a>.
        <br>
        <a href="../">Go Back</a>
    </body>
</html>