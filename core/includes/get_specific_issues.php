<?php
require '../init.php';

echo "<option value='' disabled selected>Select Specific Issue</option>";

// Get issue id from url.
$issue_id = (int)$_GET['issue_id'];

$specific_issues = $issues->specific_issues($issue_id);

// Loop to get specific issues from the databases.
foreach ($specific_issues as $a_specific_issue){

    $specific_issue_id   = $a_specific_issue['specific_issue_id'];
    $specific_issue      = $a_specific_issue['specific_issue'];
    echo '<option value="' . $general->make_safe($specific_issue_id) . '">' . $general->make_safe($specific_issue) . '</option>';

}