<?php
require_once './php/controller.php';
$entries = getEntries();

$tablestruct = "";
$listedids = array();

$deleteStatus = '';
if (isset($_POST['deleteButton'])){
    $markedfordeletion = array();
    foreach ($listedids as $value) {
        if(!empty($_POST[$value])) {
            $contact_id = $value;
            array_push($markedfordeletion,$contact_id);
        }
    }
    scrubEntries($markedfordeletion);
    $deleteStatus = 'Deleted record(s) successfully.';
}

foreach($entries as $row) {
    $id = $row["contact_id"];
    $name = $row["myname"];
    $address = $row["myaddress"];
    $city = $row["city"];
    $state = $row["mystate"];
    $phone = $row["phone"];
    $email = $row["email"];
    $dob = $row["dob"];
    $contacts = $row["contacts"];
    $agerange = $row["agerange"];

    if (empty($_POST[$id])) {
        $tablestruct = $tablestruct . "<tr><td>$name</td><td>$address</td><td>$city</td><td>$state</td><td>$phone</td><td>$email</td><td>$dob</td><td>$contacts</td><td>$agerange</td>";
        $tablestruct = $tablestruct . "<td><input class=\"form-check-input\" type=\"checkbox\" name=\"$id\"></td></tr>";
    }else{
        scrubEntry($id);
    }

    array_push($listedids,$id);
}

// WRITE YOUR CODE HERE
    return <<<HTML
    <form method="post">
        <label class="text-success">$deleteStatus</label>
        <br>
        <input type="submit" name="deleteButton" value="Delete" class="btn btn-danger"></button>
        <br>
        <table class="table table-bordered table-striped text-center" >
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">D.O.B.</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Age</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                $tablestruct
            </tbody>
        </table>
    </form>
    HTML;
?>