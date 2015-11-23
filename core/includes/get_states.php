<?php
// Loop to get states from the databases.
$states = $states_jurisdictions->states();
foreach ($states as $a_state){

    $short_name   = $a_state['ShortName'];
    $long_name    = $a_state['LongName'];

    echo '<option value="' . $general->make_safe($short_name) . '">' . $general->make_safe($long_name) . '</option>';

}