<?php
    class nameProcedure {

        public function addClearNames(){
            $nameEntry = empty($_POST["nameInput"]) ? '' : $_POST["nameInput"];
            $handle = fopen("namestore.txt","r+");

            $explodedName = explode(" ",$nameEntry);
            $firstName = $explodedName[1] ?? "";
            $lastName = $explodedName[0] ?? "";
            $nameFormatted = $lastName . ", " . $firstName . "<br>";

            if (isset($_POST['clearButton'])){
                file_put_contents("namestore.txt","");
            
                return fread($handle,1000);
            }else{

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