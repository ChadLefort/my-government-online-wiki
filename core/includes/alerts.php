<?php

// Alerts for error messages.
if(count($errors) > 0 && (is_array($errors))){

    echo"<div class='alert alert-error'>
            <a class='close' data-dismiss='alert' href='#'>&times;</a>
            <b>Error!</b><br>";

    foreach($errors as $error){

        echo "$error<br>";
    }

    echo "</div>";
    }

// Alerts for success message.
if(count($success) > 0 && (is_array($success))){

    foreach($success as $a_success){

        echo "<div class='alert alert-success'>
                <a class='close' data-dismiss='alert' href='#'>&times;</a>
                <b>Success!</b><br>
                 $a_success<br>
              </div>";
    }
}

// Alert for keyword messages.
if(count($hints) > 0 && (is_array($hints))){

    echo"<div class='alert alert-info'>
            <a class='close' data-dismiss='alert' href='#'>&times;</a>
            <b>Note!</b><br>
            Before you contact your jurisdiction here are some keywords to better help explain your issue:<br><br>";

    foreach($hints as $hint){

        echo "$hint<br>";
    }

    echo "</div>";
}