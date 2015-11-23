<?php

require '../init.php';

if (isset($_POST['query'])) {

    $query = $_POST['query'];
    $results = $issues->typeahead($query);

    $array = array();

    foreach($results as $result){
        $array[] = $result['post_title'];
    }

    echo json_encode($array);
}
