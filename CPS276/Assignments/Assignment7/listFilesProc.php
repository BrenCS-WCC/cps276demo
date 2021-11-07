<?php
    require_once './PdoMethods.php';

    function createList(){
        $pdo = new PdoMethods();
        $sqlCMD = "SELECT * FROM PDF_Info";

        $table = $pdo->selectNotBinded($sqlCMD);
        $assembledHTML = "<ul>";

        foreach($table as $row) {
            $fileName = $row["file_desiredname"];
            $filePath = $row["file_path"];

            $assembledHTML = $assembledHTML . "<li><a target=\"_blank\" href=\"$filePath\">$fileName</a></li>";
        }
        $assembledHTML = $assembledHTML . "</ul>";
        return $assembledHTML;
    }
?>