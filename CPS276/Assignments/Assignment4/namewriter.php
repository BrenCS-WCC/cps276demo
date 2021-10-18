<?php
    class nameProcedure {

        public function addClearNames(){
            $nameEntry = empty($_POST["nameInput"]) ? '' : $_POST["nameInput"];
            $handle = fopen("namestore.txt","r+");

            if (isset($_POST['clearButton'])){
                file_put_contents("namestore.txt","");
            
                return fread($handle,1000);
            }else{
                $explodedName = explode(" ",$nameEntry);
                $firstName = $explodedName[0] ?? "";
                $lastName = $explodedName[1] ?? "";
                $nameFormatted = $lastName . ", " . $firstName . "<br>";

                file_put_contents("namestore.txt",$nameFormatted,FILE_APPEND);
                $strContents = fread($handle,1000);
                $explodedArray = explode("<br>",$strContents);
                sort($explodedArray);
                $strContents = implode("<br>",$explodedArray);
                $strContents = substr($strContents,4,strlen($strContents));

                return $strContents;
            }
            fclose($handle);
        }
    }
?>