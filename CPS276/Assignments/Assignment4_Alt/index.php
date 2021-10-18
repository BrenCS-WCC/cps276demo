<?php
    require_once 'name_eater.php'; 
    $addName = new nameProcessor(); 
    $output = $addName->addClearNames();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Name Lister V2</title>
        <link href="trollface.png"  type="image/png" rel="icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body style="margin:30px;">
        <div>
            <h2>Name Appending List, But Written Correctly</h2>
            <h4>Are you just going to sit there staring at me? Get to it, man! Add some names!</h4>
            <i>(In this instance, the names being echoed back to the client aren't interpreted through an output file. 
            The original assignment instead means to use the input and list as data and append the former to the latter.)</i>
        </div>
        <hr>
        <div>
            <h4>Add Names</h4>
            <form action='index.php' method='post'>
            <div>
                <input type="submit" name = 'addButton' value = "Add Names" class="btn btn-primary"></button>
                <input type="submit" name = 'clearButton' value = "Remove Names" class="btn btn-danger"></button>
                <div class="mb-3">
                    <label for="nameInput" class="form-label" value="">Enter Name</label>
                    <input type="text" class="form-control" name="nameInput" aria-describedby="nameInput">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="listInput">List of Names</label>
                    <textarea rows="50" class="form-control" id="listInput" name="listInput" aria-describedby="listInput"><?php echo($output);?></textarea>
                </div>
            </form>
        </div>
        Brought to you by the <b>PHP Can Also Kiss My Toe</b> corporation. Form built with <a href="https://getbootstrap.com/">Bootstrap</a>.
        <br>
        <a href="../">Go Back</a>
    </body>
</html>