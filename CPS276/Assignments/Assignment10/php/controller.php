<?php
    require_once './classes/Pdo_methods.php';

    $page = 'form';
    if (!empty($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else if (!empty($_REQUEST['addButton'])) {
        $page = 'form';
    } else if (!empty($_REQUEST['deleteButton'])) {
        $page = 'display';
    }

    if ($page === 'form'){
        return $_POST;
    }

    function createEntry($packedData) {
        $pdo = new PdoMethods();
        $name = $packedData['name'];
        $address = $packedData['address'];
        $city = $packedData['city'];
        $state = $packedData['state'];
        $phone = $packedData['phone'];
        $email = $packedData['email'];
        $dob = $packedData['birthdate'];
        $contacts = $packedData['contacts'];
        $agerange = $packedData['agerange'];

        if (isset($packedData['submitButton'])){
            $sqlINSERT = "INSERT INTO contacts (myname,myaddress,city,mystate,phone,email,dob,contacts,agerange) VALUES ('".addslashes($name)."','$address','$city','$state','$phone','$email','$dob','$contacts','$agerange')";
            $pdo->selectNotBinded($sqlINSERT);
        }
    }
    function scrubEntries($markedfordeletion) {
        $pdo = new PdoMethods();
        foreach($markedfordeletion as $value){
            $sqlDELETE = "DELETE FROM contacts WHERE contact_id = $value";
            $pdo->selectNotBinded($sqlDELETE);
        }
    }
    function scrubEntry($markedentry) {
        $pdo = new PdoMethods();
        $sqlDELETE = "DELETE FROM contacts WHERE contact_id = $markedentry";
        $pdo->selectNotBinded($sqlDELETE);
    }
    function getEntries() {
        $pdo = new PdoMethods();
        $sqlSELECT = "SELECT * FROM contacts";
        $table = $pdo->selectNotBinded($sqlSELECT);
        return $table;
    }
?>