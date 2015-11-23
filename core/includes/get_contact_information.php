<?php

// Code used to get jurisdiction contact information and keywords to help users depending on their issue selection.

$jurisdiction_id    = $_SESSION['jurisdiction_id'];

// Send the user back to the state/jurisdiction selection page if no jurisdiction has been selected.
if(!isset($jurisdiction_id)){

    header('Location:' . $general->site_url() . '/wiki/contact-my-jurisdiction/');
    exit;

} else {

    // Grab all the jurisdiction info from the database.
    $info               = $states_jurisdictions->info($jurisdiction_id);
    $jurisdiction       = $info['ParishName'];
    $phone              = $info['Phone'];
    $fax                = $info['Fax'];
    $email              = $info['Email'];
    $address            = $info['Address'];
    $city               = $info['City'];
    $state              = $info['State'];
    $zipcode            = $info['ZipCode'];

    // Convert numbers into proper format.
    $phone              = $general->format_phone($phone);
    $fax                = $general->format_phone($fax);

    // Grab the variable for specific issue id.
    $specific_issue_id  = $_SESSION['specific_issue_id'];
    // Grab the keywords information from the database
    $keywords           = $issues->keywords($specific_issue_id);


    // Loop to get all the keywords from the database.
    foreach ($keywords as $keyword) {

        $hints[] = $keyword['keywords'];

    }

    // Displays the information alert to show the keywords.
    require 'core/includes/alerts.php';

    // If no contact information is available send the user back to our contact information.
    if (empty($address) && empty($phone) && empty($fax) && empty($email)){

        header('Location:' . $general->site_url() . '/wiki/contact-my-government-online/');
        exit;

        // Display/hide information depending on whether it is available or not.
    } else {

        echo "<address><strong>$jurisdiction</strong><br>";
    }

    if(!empty($address)){

        echo "$address<br> $city, $state $zipcode<br>";
    }

    if (!empty($phone)){

        echo "<abbr title='Phone'>P:</abbr> $phone<br>";
    }

    if (!empty($fax)){

        echo "<abbr title='Fax'>F:</abbr> $fax<br>";
    }

    if (!empty($email)){

        echo "<a href='mailto:$email'>$email</a>";
    }

    if (!empty($address) || !empty($phone) || !empty($fax) || !empty($email)){

        echo "</address>";
    }
}