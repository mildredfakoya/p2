<?php
function sanitize($input){
$input = trim($input);
$input = stripslashes($input);
$input = htmlspecialchars($input);
}
?>
