<?php
function validate_input($input)
{
    $input = trim($input);// Remoes The White Space from both end
    $input = stripslashes($input);//Returns a string with backslashes stripped off.
    $input = htmlspecialchars($input);//converts some predefined characters to HTML entities.
    return $input;
}


function String_Has_number(string $input): bool
{
    for ($pos = 0; $pos < strlen($input); $pos++) {
        if (ctype_digit($input[$pos])) {
            return true;
            break;
        }
    }
    return false;
}

function Check_Character(string $input): bool
{
    $numberCheck = String_Has_number($input);
    if ($numberCheck == true) {
        return false;
    }

    $lenght = strlen($input);
    if ($lenght < 50) {
        return true;
    } else {
        return false;
    }
}


function Check_Password($input): bool
{
    $lenght = strlen($input);
    if ($lenght < 50) {
        return true;
    } else {
        return false;
    }
}

function Check_Age(int $input): bool
{


    if ($input >= 18 && $input <= 100) {
        return true;
    } else {
        return false;
    }
}

function Check_Date_Of_Birth($userDateofBirth)
{


    $todayDate = date("Y-m-d");
    $start_date = strtotime($userDateofBirth);
    $end_date = strtotime($todayDate);


    $input = $diff = abs($start_date - $end_date);
    return floor($input / (365 * 60 * 60 * 24));
}


function Check_Email(string $input): bool
{
    for ($pos = 0; $pos < strlen($input); $pos++) {
        if ($input[$pos] == "@") {
            return true;
            break;
        }
    }
    return false;
}

function Check_Array_Lenght($input): bool
{
    $lenght = count($input);
    if ($lenght >= 2) {
        return true;
    } else {
        return false;
    }
}