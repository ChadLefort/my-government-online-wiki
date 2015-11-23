<?php
// Code used for error checking before we send the email on the contact form.

// Grab the session variable so we can make sure the previous steps were completed and also to include them in customer's email.
$main_issue      = $_SESSION['main_issue'];
$specific_issue  = $_SESSION['specific_issue'];

if (!isset($main_issue) && (!isset($specific_issue))){

    header('Location:' . $general->site_url() . '/wiki/select-your-issue/');
    exit;

}

if(isset($_POST['contact_errors'])){

    // All of the error checking on the contact form.
    if(empty($_POST['your_name'])){

        $errors[] = 'Please enter a name.';

    } else if (strlen($_POST['your_name']) > 50){

        $errors[] = 'The name field can\'t be longer than 50 characters.';

    } else if (ctype_alpha(str_replace(' ', '', $_POST['your_name'])) === false) {

        $errors[] = 'Name must contain letters and spaces only. Please refrain from using special characters.';
    }

    if(empty($_POST['phone'])){

        $errors[] = 'Please enter a phone number.';

    } else if (strlen($_POST['phone']) > 14){

        $errors[] = 'The phone field can\'t be longer than 10 characters.';

    }

    if(empty($_POST['email'])){

        $errors[] = 'Please enter a email address.';

    } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

        $errors[] = 'Please enter a valid email address';

    } else if (strlen($_POST['email']) > 50){

        $errors[] = 'The email field can\'t be longer than 50 characters.';
    }

    if (strlen($_POST['subject']) > 100){

        $errors[] = 'The subject field can\'t be longer than 100 characters.';
    }

    if(empty($_POST['message'])){

        $errors[] = 'Please enter in details about your issue(s).';

    } else if (strlen($_POST['message']) > 2000){

        $errors[] = 'The issue(s) field can\'t be longer than 2000 characters.';
    }

    // If there are no errors then we send the email.
    if(empty($errors) === true){

        $name           = $_POST['your_name'];
        $phone          = $_POST['phone'];
        $permit_number  = $_POST['permit_number'];
        $email          = $_POST['email'];
        $subject        = $_POST['subject'];
        $message        = $_POST['message'];

        $general->contact($name, $email, $phone, $permit_number, $subject, $message, $main_issue, $specific_issue);
        $success[]  = 'Your email has been sent!';
    }
}
