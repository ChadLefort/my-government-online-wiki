<?php
// Code used to send the customer to the jurisdiction contact information.

// Grab the session variable so we can make sure the previous steps were completed.
$main_issue      = $_SESSION['main_issue'];
$specific_issue  = $_SESSION['specific_issue'];

if (!isset($main_issue) && (!isset($specific_issue))){

    header('Location:' . $general->site_url() . '/wiki/select-your-issue/');
    exit;

}

if(isset($_POST['state-jurisdiction_errors'])){

    // Error checking.
    if(empty($_POST['jurisdiction'])){

        $errors[] = 'You skipped step 2. You need to select a jurisdiction.';

    } else {

        // Get the both jurisdiction id from dropdown form and set as session variable.
        $jurisdiction_id    = $_POST['jurisdiction'];
        $_SESSION['jurisdiction_id'] = $jurisdiction_id;

        // Send the user to jurisdiction contact information page.
        header('Location:' . $general->site_url() . '/wiki/contact-information/');
        exit;
    }
}