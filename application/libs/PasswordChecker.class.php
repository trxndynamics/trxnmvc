<?php

class PasswordChecker {
    public static function password_strength($password){
        //Strength Scoring
        $pass_score = 0;

        $pass_len = FALSE;
        $pass_lc = FALSE;
        $pass_uc = FALSE;
        $pass_num = FALSE;
        $pass_weird = FALSE;

        //Pad
        $password = 0 . $password;

        //Check Length
        if (strlen($password)>6) $pass_len = TRUE;

        //Check Lowercase Characters
        for ($i = 97; $i <=122; $i++) {
            if (@strpos($password, chr($i))) $pass_lc = TRUE;
        }

        //Check Uppercase Characters
        for ($i = 65; $i <=90; $i++) {
            if (@strpos($password, chr($i))) $pass_uc = TRUE;
        }

        //Check Numbers
        for ($i = 48; $i <=57; $i++) {
            if (@strpos($password, chr($i))) $pass_num = TRUE;
        }

        //Check Weird Characters
        for ($i = 33; $i <=126; $i++) {
            //Excempt
            if (($i>47 && $i<58) || ($i>64 && $i<91) || ($i>96 && $i<123)) {
                //Null
            } else {
                if (@strpos($password, chr($i))) $pass_weird = TRUE;
            }
        }

        //Points
        if ($pass_len) $pass_score = $pass_score + 10;
        if ($pass_lc) $pass_score = $pass_score + 20;
        if ($pass_uc) $pass_score = $pass_score + 20;
        if ($pass_num) $pass_score = $pass_score + 20;
        if ($pass_weird) $pass_score = $pass_score + 30;

        return $pass_score;
    }

    public static function checkPasswordAgainstMinLength($strToCheck, $minLength=7){
        if(strlen($strToCheck) >= $minLength)   return true;
        else return false;
    }

    public static function checkPasswordStrength($strToCheck, $minStrength=70){
        $passwordStrength = PasswordChecker::password_strength($strToCheck);
        if($passwordStrength >= $minStrength) return true;
        else return false;
    }

    public static function createPasswordHash($strPlainText) {
        if (CRYPT_SHA512 != 1) {
            echo "HASHING MECHANISM NOT SUPPORTED";
            throw new \Exception('Hashing mechanism not supported.');
        }

        //$6$ defines as SHA512 pass
        //rounds determines the number of times it has to run the hashing algorithm to produce the final hash

        return crypt($strPlainText, '$6$rounds=4578$D4IvlPQsVLtpglI3IvcaskQLpOQklhCKRVQT10JZ6FY4fcl6BkrqIuUPPvcv2i.S22PgErTG/EN5mvL.ChWQW21$');
    }

    public static function validate($strPlainText, $strHash) {

        if (CRYPT_SHA512 != 1) {
            throw new \Exception('Hashing mechanism not supported.');
        }

        return (crypt($strPlainText, '$6$rounds=4578$D4IvlPQsVLtpglI3IvcaskQLpOQklhCKRVQT10JZ6FY4fcl6BkrqIuUPPvcv2i.S22PgErTG/EN5mvL.ChWQW21$') == $strHash) ? true : false;
    }
}

?>