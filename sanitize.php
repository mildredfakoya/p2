<?php

/**
function to sanitize users input
**/
function sanitize($input){
$input = trim($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);
return $input;
}
?>
