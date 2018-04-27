<?php

function myProfileSetSessions($value)
{
    $user = new User(0,'','','');
    $user = $value;
    
    $_SESSION['QuotesEmail'] = $user->getEmail();
    $_SESSION['QuotesPassword'] = $user->getPassword();
    $_SESSION['QuotesType'] = $user->getType();
}

function myProfileUnsetSessions()
{
    unset($_SESSION['QuotesEmail']);
    unset($_SESSION['QuotesPassword']);
    unset($_SESSION['QuotesType']);
}

