<?php
    require_once 'namewriter.php'; 
    $addName = new nameProcedure(); 
    $output = $addName->addClearNames();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Name Appending List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="margin:20;padding:0">
        <div>
            <h2>Name Appending List</h2>
            <h5>Are you just going to sit there staring at me? Get to it, man! Add some names!</h3>
        </div>
        <hr>
        <div>
            <h4>Add Names</h4>
            <form action='index.php' method='post'>
            <div>
                <input type="submit" name = 'addButton' value = "Add Names" class="btn btn-primary"></button>
                <input type="submit" name = 'clearButton' value = "Remove Names" class="btn btn-primary"></button>
                <div class="mb-3">
                    <label for="nameInput" class="form-label" value="">Enter Name</label>
                    <input type="text" class="form-control" name="nameInput" aria-describedby="nameInput">
                </div>
                <div class="mb-3"></div>
                    <label class="form-label">List of Names</label>
                    <div class="h-100 card">
                        <div class="card-body">
                            <?php echo($output)?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        Brought to you by the <b>PHP Can Kiss My Foot</b> corporation.
        <br>
        <a href="../">Go Back</a>
    </body>
</html>