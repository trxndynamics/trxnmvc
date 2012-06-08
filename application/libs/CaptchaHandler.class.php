<?php

namespace trxnMVC;

class CaptchaHandler
{
    public static function verifyCaptcha($challengeField, $responseField){
        $ch         = curl_init("http://www.google.com/recaptcha/api/verify");
        $encoded    = '';
        $sendFields = array(
            'privatekey'    => captchaPrivateKey,
            'remoteip'      => $_SERVER['REMOTE_ADDR'],
            'challenge'     => $challengeField,
            'response'      => $responseField);

        foreach($sendFields as $name => $value) {
            $encoded .= urlencode($name).'='.urlencode($value).'&';
        }
        $encoded = substr($encoded, 0, strlen($encoded)-1); // chop off last ampersand
        curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        if(isset($response) && ($response!=null)
            && (strlen($response) > 5) && (substr($response,0,4) === 'true')){
            return true;
        } else {
            return false;
        }
    }
}