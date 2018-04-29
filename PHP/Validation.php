<?php
function validateRegistration(){
    $success;
    $valid=true;
    $success_all = array();
    
    $success = validateEmail('txtEmail');
    array_push($success_all, $success);
    $success = validatePassword('txtPassword', 'txtRePassword');
    array_push($success_all, $success);
    
    foreach ($success_all as $value){
        if($value==false){
            $valid = false;
        }
    }
    
    return $valid;
}
function validateNewQuote(){
    $success;
    $valid=true;
    $success_all = array();
    
    $success = validateNotNull('txtQuote');
    array_push($success_all, $success);
    foreach ($success_all as $value){
        if($value==false){
            $valid = false;
        }
    }
    
    return $valid;
}


function validateUpdateUserDetails(){
    $success;
    $valid=true;
    $success_all = array();
    
    $success = validateCombo('cmbTypes');
    array_push($success_all, $success);
    
    foreach ($success_all as $value){
        if($value==false){
            $valid = false;
        }
    }
    
    return $valid;
}

function validateTextOnly($value){
    if(!empty($_POST[$value])){
        if(ctype_alpha($_POST[$value])){
            return true;
        }
    }
    return false;
}

function validateNotNull($value){
    if(!empty($_POST[$value])){
        return true;
    }
    return false;
}

function validateAlternativeInut($value){
    if(!empty($_POST[$value])){
        return true;
    }
    
    return false;
}

function validateEmail($value){
    if(!empty($_POST[$value])){
        if(filter_var($_POST[$value],FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
    }
    return false;
}

function validatePassword($value1,$value2){
    if(!empty($_POST[$value1])){
        if($_POST[$value1]===$_POST[$value2]){
            if((strlen($_POST[$value1])>=8)&& (!ctype_alpha($_POST[$value1]))&&(ctype_alnum($_POST[$value1]))){
                return true;
            }
        }
    }
    return false;
}

function showTextError($value,$button){
    if(isset($_POST[$button])){
        if(validateTextOnly($value)==false)
    {
        echo '*';
    }
    else {echo '';}
    }
    else {echo '';}
}

function showAlternativeError($value,$button){
     if(isset($_POST[$button])){
        if(validateAlternativeInut($value)==false)
    {
        echo '*';
    }
    else {echo '';}
    }
    else {echo '';}
}

function showEmailError($value,$button){
    if(isset($_POST[$button])){
        if(validateEmail($value)==false)
    {
        echo '*';
    }
    else {echo '';}
    }
    else {echo '';}
}

function showPasswordError($value1,$value2,$button){
    if(isset($_POST[$button])){
        if(validatePassword($value1,$value2)==false)
    {
        echo '*';
    }
    else {echo '';}
    }
    else {echo '';}
}
function validateCombo($value){
    if(!empty($_POST[$value])){
        if($_POST[$value]!="<-->"){
            return true;
        }
    }
    return false;
}

function showComboError($value,$button){
    if(isset($_POST[$button])){
        if(validateCombo($value)==false){
            echo '*';
        }else {echo '';}
    }else {echo '';}
}

