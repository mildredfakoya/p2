<?php
require_once "userdefinedfunctions.php";

use project2\userDefinedFunctions;

$functions = new UserDefinedFunctions();
$firstname = $lastname = $maidenname = $day = $month = $year = $gender = $card = $notes = "";
$firstnameErr = $lastnameErr = $genderErr = "";
// Getting the form data
if (isset($_POST['submit'])) {
    $firstname = strtoupper(!empty($_POST['firstname']) ? $functions->sanitize($_POST['firstname']) : null);
    $lastname = strtoupper(!empty($_POST['lastname']) ? $functions->sanitize($_POST['lastname']) : null);
    $maidenname = !empty($_POST['maidenname']) ? $functions->sanitize($_POST['maidenname']) : null;
    $day = !empty($_POST['day']) ? $functions->sanitize($_POST['day']) : null;
    $month = !empty($_POST['month']) ? $functions->sanitize($_POST['month']) : null;
    $year = empty($_POST["year"]) ? "yyyy" : (!empty($_POST['year']) ? $functions->sanitize($_POST['year']) : null);
    $gender = !empty($_POST['gender']) ? $functions->sanitize($_POST['gender']) : null;
    $card = !empty($_POST['card']) ? $functions->sanitize($_POST['card']) : null;
    $notes = !empty($_POST['notes']) ? $functions->sanitize($_POST['notes']) : null;
    if (empty($firstname)) {
        $firstnameErr = "First name is required";
    }
    if (empty($lastname)) {
        $lastnameErr = "Last name is required";
    }

    if (empty($gender)) {
        $genderErr = "Please select a gender";
    }
    if (empty($maidenname)) {
        $maidenname = "unknown";
    }

//Automatically generate the testing code.
    $a = substr($firstname, 0, 1);
    $b = substr($maidenname, 0, 1);
    $c = substr($lastname, 0, 1);
    $d = substr($year, 2);
    $e = substr($gender, 0, 1);
    $testingcode = strtoupper($a . $b . $c . $d . $e);

    if ($firstname && $lastname && $gender) {
        echo '<span class ="color3"> A test record has been successfully created for ' . $firstname . " " . $lastname . ". The testing code is: " . $testingcode . '</span>';
    } else {
        echo '<span class ="error">Please fill in all the required field for the testing code to be generated</span>';
    }
}
