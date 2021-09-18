<?php
    $testInt = 1;
    $testString = 'PHP Things';
?>

<html>
    Hello World
    <?php
        echo('<br>');
        echo("We are doing $testString");
        echo('<br>');
        echo('We are doing $testString as well<br>');
        if ($testInt > 0) {
            echo("$testInt is greater than 0.");
        } else {
            echo("$testInt is not greater than 0.");
        }
    ?>
</html>