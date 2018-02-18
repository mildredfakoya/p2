<?php
namespace project2;
class UserDefinedFunctions
{
    public function sanitize($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }

}
