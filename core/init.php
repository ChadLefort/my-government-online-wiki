<?php
session_start();
require 'connect/database.php';
require 'connect/my_database.php';
require 'phpmailer/class.phpmailer.php';
require 'classes/states_jurisdictions.php';
require 'classes/issues.php';
require 'classes/general.php';

error_reporting(0);

$errors  = array();
$success = array();
$hints   = array();

$states_jurisdictions = new States_Jurisdictions($db);
$issues               = new Issues($my_db);
$general              = new General();

ob_start(); // Added to avoid a common error of 'header already sent' //