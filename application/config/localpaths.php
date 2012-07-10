<?php

//for changing the salting of passwords see /libs/PasswordChecker.class.php
//the functions are createPasswordHash and validate methods, where the crypt function salt methods need to match
//did not want to define salt as global for access purposes, so have left it in the only place it is used

const urlpath = 'http://trxnmvc.localhost';