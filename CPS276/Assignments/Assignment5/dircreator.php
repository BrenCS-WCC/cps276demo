<?php
    class directories {
        public function makeDirectory(){
            if(isset($_POST['submitButton'])){
                if(isset($_POST['dirName']) && $_POST['dirName'] != ''){
                    $dirName = $_POST['dirName'];
                    if (file_exists("directories/$dirName")){
                        return "Error: The directory \"$dirName\" <a href=\"directories/$dirName/readme.txt\" target=\"_blank\" rel=\"noreferrer noopener\">already exists!</a>";
                    }
                    mkdir("directories/$dirName",0777);
                    chmod("directories/$dirName",0777);

                    $fileContents = $_POST['fileInput'] ?? '';
                    file_put_contents("directories/$dirName/readme.txt",$fileContents);
                    chmod("directories/$dirName/readme.txt",0777);

                    return "Created file and directory <a href=\"directories/$dirName/readme.txt\" target=\"_blank\" rel=\"noreferrer noopener\">here.</a>";
                }else{
                    return 'Error: You MUST have a valid directory name!';
                }
            }
        }
    }
?>