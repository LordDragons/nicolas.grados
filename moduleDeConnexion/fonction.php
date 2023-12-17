<?php
//Mot de passe 
function password_strength_check($password, $min_len = 6, $max_len = 15, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1)
{

    // Build regex string depending on requirements for the password
    $regex = '/^';
    if ($req_digit == 1) {
        $regex .= '(?=.\d)';
    }              // Match at least 1 digit
    if ($req_lower == 1) {
        $regex .= '(?=.[a-z])';
    }           // Match at least 1 lowercase letter
    if ($req_upper == 1) {
        $regex .= '(?=.[A-Z])';
    }          // Match at least 1 uppercase letter
    if ($req_symbol == 1) {
        $regex .= '(?=.[^a-zA-Z\d])';
    }    // Match at least 1 character that is none of the above
    $regex .= '.{' . $min_len . ',' . $max_len . '}$/';


    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $password)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
