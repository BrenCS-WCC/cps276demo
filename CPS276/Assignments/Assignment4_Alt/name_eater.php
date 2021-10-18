<?php
    class nameProcessor{
        public function addClearNames(){
            if (!isset($_POST['nameInput'])){
               return $_POST['listInput'] ?? '';
            }

            if (isset($_POST['clearButton'])){
               return '';
            }else{
                $newInput = $_POST['nameInput'];
                $splitInput = explode(" ",$newInput);
                
                $newInput = $splitInput[1] . ", " . $splitInput[0];
                $explodedResult = preg_split('/\r\n|[\r\n]/',$_POST['listInput']);
                array_push($explodedResult,$newInput);
                sort($explodedResult);
                $finalResult = implode('&#10;',$explodedResult);


                return $finalResult;
            }
        }
    }
?>