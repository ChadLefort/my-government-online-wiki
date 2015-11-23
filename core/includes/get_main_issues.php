<?php
// Loop to get main issues from the databases.
$issues = $issues->main_issues();
foreach ($issues as $a_issue){

    $issue_id   = $a_issue['issue_id'];
    $issue      = $a_issue['issue'];

    echo '<option value="' . $general->make_safe($issue_id) . '">' . $general->make_safe($issue) . '</option>';
}