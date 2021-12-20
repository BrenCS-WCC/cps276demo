<?php
    $error = false;

    $formcontents = require './php/controller.php';

    $textfields = array(
        "name" => $formcontents['name'] ?? '',
        "address" => $formcontents['address'] ?? '',
        "city" => $formcontents['city'] ?? '',
        "phone" => $formcontents['phone'] ?? '',
        "email" => $formcontents['email'] ?? '',
        "birthdate" => $formcontents['birthdate'] ?? ''
    );

    foreach ($textfields as $key => $value) {
        if (empty($formcontents[$key])) {
            $formcontents[$key] = '';
            $error = true;
        }
    }

    $namestat = $addstat = $citystat = $phonestat = $estat = $birthstat = '';
    if (isset($formcontents['submitButton'])) {
        $namestat = $formcontents['name']== '' ? '> You must enter a valid name!' : '';
        $addstat = $formcontents['address']== '' ? '> You must enter a valid address!' : '';
        $citystat = $formcontents['city']== '' ? '> You must enter a city!' : '';
        $phonestat = $formcontents['phone']== '' ? '> You must enter a valid phone number!' : '';
        $estat = $formcontents['email']== '' ? '> You must enter a valid email!' : '';
        $birthstat = $formcontents['birthdate']== '' ? '> You must enter a valid birth date!' : '';

        if (!preg_match('/^[a-zA-Z\s\'\-]*$/',$formcontents['name'])) {
            $namestat = '> You must enter a valid name!';
            $error = true;
        }
        if (!preg_match('/^[0-9]{1,}\s[a-zA-Z0-9\s]{1,}$/',$formcontents['address'])) {
            $addstat = '> You must enter a valid address!';
            $error = true;
        }
        if (!preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{4}$/',$formcontents['phone'])) {
            $phonestat = '> You must enter a valid phone number!';
            $error = true;
        }
        if (!preg_match('/^[a-zA-Z0-9]{1,}@[a-zA-Z0-9]{1,}\.[a-zA-Z0-9]{3,}$/',$formcontents['email'])) {
            $estat = '> You must enter a valid email!';
            $error = true;
        }
        if (!preg_match('/^[0-1][0-9]\/[0-3][0-9]\/[0-9]{4}$/',$formcontents['birthdate'])) {
            $birthstat = '> You must enter a valid birthdate!';
            $error = true;
        }
    }

    $statestat = null;
    $kansas = $missouri = $michigan = $kentucky = $maine = '';

    if(!empty($formcontents['state'])) {
        $kansas = $formcontents['state']=='KS' ? 'selected' : '';
        $missouri = $formcontents['state']=='MO' ? 'selected' : '';
        $michigan = $formcontents['state']=='MI' ? 'selected' : '';
        $kentucky = $formcontents['state']=='KY' ? 'selected' : '';
        $maine = $formcontents['state']=='ME' ? 'selected' : '';
    }else if(!empty($formcontents['submitButton'])){
        $statestat = '> You must select a state!';
        $error = true;
    }

    $newsletter = null;
    $formcontents['contacts'] = "";
    if(!empty($formcontents['newsletter'])) {
        $newsletter = 'checked';
        $formcontents['contacts'] = $formcontents['contacts'] . 'Newsletter,';
    }
    $emailcontact = null;
    if(!empty($formcontents['emailcontact'])) {
        $emailcontact = 'checked';
        $formcontents['contacts'] = $formcontents['contacts'] . 'Email Updates,';
    }
    $textcontact = null;
    if(!empty($formcontents['textcontact'])) {
        $textcontact = 'checked';
        $formcontents['contacts'] = $formcontents['contacts'] . 'Text Updates';
    }
    
    $agestat = '';
    $age1 = null;
    $age3 = null;
    $age2 = null;
    $age4 = null;
    if (!empty($formcontents['agerange'])) {
        if($formcontents['agerange'] === '10-18') {
            $age1 = 'checked';
        } else if($formcontents['agerange'] === '19-30') {
            $age2 = 'checked';
        } else if($formcontents['agerange'] === '30-50') {
            $age3 = 'checked';
        } else if($formcontents['agerange'] === '51+') {
            $age4 = 'checked';
        }
    } else if(!empty($formcontents['submitButton'])){
        $agestat = '> You must select an age!';
        $error = true;
    }

    $submitstatus = '';
    $errorstatus = '';
    if ($error == false){
        createEntry($formcontents);
        $submitstatus = 'Entry submitted successfully.';
    } else if(isset($formcontents['submitButton'])){
        $errorstatus = 'There was a problem submitting your details. See below for more info.';
    }

//WRITE YOUR CODE HERE
    $htmlpage = <<<HTML
            <div>
            <label class="text-success" for="name">$submitstatus</label>
            <label class="text-danger" for="name">$errorstatus</label>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name (Letters Only)</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$namestat</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{$formcontents['name']}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address">Address (Number and Street)</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$addstat</label>
                        <input rows="5" class="form-control" id="address" name="address" aria-describedby="address" value="{$formcontents['address']}"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="city">City</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$citystat</label>
                        <input rows="5" class="form-control" id="city" name="city" aria-describedby="city" value="{$formcontents['city']}"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="state">State</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$statestat</label>
                        <select class="form-control" id="state" name="state">
                            <option value="KS" $kansas>Kansas</option>
                            <option value="MO" $missouri>Missouri</option>
                            <option value="MI" $michigan>Michigan</option>
                            <option value="KY" $kentucky>Kentucky</option>
                            <option value="ME" $maine>Maine</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$phonestat</label>
                        <input rows="5" class="form-control" id="phone" name="phone" aria-describedby="phone" value="{$formcontents['phone']}"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email Address</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$estat</label>
                        <input rows="5" class="form-control" id="email" name="email" aria-describedby="email" value="{$formcontents['email']}"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="birthdate">Date of Birth</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$birthstat</label>
                        <input rows="5" class="form-control" id="birthdate" name="birthdate" aria-describedby="birthdate" value="{$formcontents['birthdate']}"></input>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Please check all contact types you would like (optional):</label>
                        <br>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="newsletter" value="newsletter" $newsletter>
                            <label class="form-check-label" for="newsletter">Newsletter</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="emailcontact" value="emailcontact" $emailcontact>
                            <label class="form-check-label" for="emailcontact">Email Updates</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="textcontact" value="textcontact" $textcontact>
                            <label class="form-check-label" for="textcontact">Text Updates</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Please select an age range:</label>
                        <label class="text-danger" for="name">*</label>
                        <label class="text-danger" for="name">$agestat</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="agerange" id="10to18" value="10-18" $age1>
                            <label class="form-check-label" for="10to18">10-18</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="agerange" id="19to30" value="19-30" $age2>
                            <label class="form-check-label" for="19to30">19-30</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="agerange" id="30to50" value="30-50" $age3>
                            <label class="form-check-label" for="30to50">30-50</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="agerange" id="51plus" value="51+" $age4>
                            <label class="form-check-label" for="51plus">51+</label>
                        </div>
                    </div>
                    <input type="submit" name = "submitButton" value = "Submit" class="btn btn-primary"></button>
                </form>
            </div>
            <hr>
            Form built with <a href="https://getbootstrap.com/">Bootstrap</a>.
            <br>
            <a href="../">Go Back</a>
        HTML;
        return $htmlpage;
?>