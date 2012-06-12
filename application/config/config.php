<?php

namespace trxnMVC;

/*
 * GOOGLE CAPTCHA
 */

//for captcha validation enabling
//use your google account and get your private and public keys here:
//https://developers.google.com/recaptcha

const captchaEnabled    = false;
const captchaPublicKey  = '';   //your captcha public key goes here
const captchaPrivateKey = '';   //your captcha private key goes here

/*
 * MAIL CHIMP
 */
//for fetching the APIKEY:
//login to your mailchimp account and then go to the account section, then apikeys and add a key,
//and then insert the key into mailchimpAPIKey
//
//for fetching the default list id:
//for the default list id, login, go to lists then create a list or use a currently created list,
//then click on settings and click on lists and unique id, and grab the unique id 'Unique Id For List WebsiteSubscribers'
//that will be used for the default list id

const mailchimpEnabled          = false;
const mailchimpAPIKey           = '';       //your mailchimp api key goes here
const mailchimpDefaultListId    = '';                                 //your list id goes here


/*
 * TWITTER
 */

//for use in the display windows displaying twitter feed
const twitterusername           = 'trxndynamics';
?>