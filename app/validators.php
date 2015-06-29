<?php

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[a-zA-Z0-9\-\_]+$/u', $value);
    //lavidation can olnly contaion latteres, numberes - and _
});





/*
|--------------------------------------------------------------------------
| Custom Validation Rules
|--------------------------------------------------------------------------
|
| Custom rules created in app/validators.php
|
*/
