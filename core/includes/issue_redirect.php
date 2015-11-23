<?php

// Code used to redirect the customer depending on their submitted issue.
if(isset($_POST['issue_errors'])){

    // Error checking.
    if(empty($_POST['specific-issue'])){

        $errors[] = 'You skipped step 2. You need to select an specific issue.';

    } else {

        // Get the both issue ids from dropdown form.
        $main_issue_id      = $_POST['main-issue'];
        $specific_issue_id  = $_POST['specific-issue'];
        $_SESSION['specific_issue_id'] = $specific_issue_id;

        // Pass the ids to query from our issues class.
        $issue = $issues->info($main_issue_id, $specific_issue_id);

        // Pull the issue descriptions from database and set them as session variables.
        $main_issue                 = $issue['issue'];
        $specific_issue             = $issue['specific_issue'];
        $_SESSION['main_issue']     = $main_issue;
        $_SESSION['specific_issue'] = $specific_issue;

        // Check to see if it is a jurisdiction issue then redirect.
        $is_jurisdiction                = $issue['is_jurisdiction_issue'];

        if($is_jurisdiction == 1){

            header('Location:' . $general->site_url() . '/wiki/contact-my-jurisdiction/');
            exit;

        } else {

            header('Location:' . $general->site_url() . '/wiki/contact-my-government-online/');
            exit;
        }
    }

    // If they select 'I don't see my issue' don't show step 2.
    if ($_POST['main-issue'] == 3){

        // 3 & 5 or the ids for 'I don't see my issue'.
        // Pass those ids to query from our issues class.
        $issue = $issues->info(3, 5);

        // Pull the issue descriptions from database and set them as session variables.
        $main_issue                 = $issue['issue'];
        $specific_issue             = $issue['specific_issue'];
        $_SESSION['main_issue']     = $main_issue;
        $_SESSION['specific_issue'] = $specific_issue;

        // Redirect them to our contact information.
        header('Location:' . $general->site_url() . '/wiki/contact-my-government-online/');
        exit;
    }
}