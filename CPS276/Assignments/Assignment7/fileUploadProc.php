<?php
    require_once './PdoMethods.php';

    $runState = "Please upload a PDF file.";

    function addFile() {
        $pdo = new PdoMethods();

        global $runState;
        if (isset($_POST["uploadButton"])){
                $errorID = $_FILES["fileUpload"]["error"];
                $targetPath;
                $desiredName = $_POST["fileName"];
                if ($desiredName){
                    $targetPath = "./files/" . $desiredName . ".pdf";
                } else {
                    $runState = "You must specify a file name. Please try again.";
                    return $runState;
                }

                switch ($errorID){
                    case 0: //No preliminary error, continue
                        if ($_FILES["fileUpload"]["type"] == 'application/pdf') {
                            if ($_FILES["fileUpload"]["size"] < 100000) {
                                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "$targetPath")){       //File has completed all checks successfully, now save it to the server
                                    chmod($targetPath,0777);

                                    $runState = "File uploaded successfully.";
                                    $sqlCMD = "INSERT INTO PDF_Info (file_desiredname,file_path) VALUES ('$desiredName','$targetPath')";
                                    $pdo->selectNotBinded($sqlCMD);
                                } else {
                                    $runState = "There was a problem uploading your file. Please try again.";
                                }
                            } else { //File is too large
                                $runState = "The file you have chosen is too large(>100000 bytes). Please try again.";
                            }
                        } else { //File is of wrong type
                            $runState = "The file you have chosen is not a PDF. Please try again.";
                        }
                        break;
                    case 4: //No file selected
                        $runState = "There was a problem uploading your file. Please try again. [UPLOAD_ERR_NO_FILE]";
                        break;
                    default:
                        $runState = "There was a problem uploading your file. Please try again. [$errorID]";
                        break;
                }
        }
        return $runState;
    }
?>