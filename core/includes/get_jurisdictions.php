<?php
require '../init.php';

echo "<option value='' disabled selected>Select Your Jurisdiction</option>";

// Get state id from url.
$short_name = (string)$_GET['state'];

$jurisdictions = $states_jurisdictions->jurisdictions($short_name);

// Loop to get jurisdictions from the databases.
foreach ($jurisdictions as $a_jurisdiction){

    $jurisdiction_id   = $a_jurisdiction['ParishId'];
    $jurisdiction      = $a_jurisdiction['ParishName'];
    echo '<option value="' . $general->make_safe($jurisdiction_id) . '">' . $general->make_safe($jurisdiction) . '</option>';

}