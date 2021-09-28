<?php
    function generateTable($rows = 0,$columns = 0){

        $header = "Generated table: $rows rows, $columns columns.";
        $catHTML = "<table border=1 cellspacing=5>";
        for ($i = 1; $i <= $rows; $i++){
            $catHTML = "$catHTML <tr>";
            for ($j = 1; $j <= $columns; $j++){
                $catHTML = "$catHTML <td> Row $i Cell $j </td>";
            }
            $catHTML = "$catHTML </tr>";
        }
        $catHTML = "$catHTML </table>";
        return "$header <hr> $catHTML";
    }
?>

<!DOCTYPE = HTML>

<html>
    <title>PHP/HTML Table Generator</title>

    <?php echo(generateTable(15,5));?>
    <br>
    <a href = "./">Go Back</a>
</html>