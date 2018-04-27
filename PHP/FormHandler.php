<?php

function stickyTextBox($value,$button){
    if(isset($_POST[$button])){
        echo $_POST[$value];
    }
    else{echo "";}
}

function  stickyCombo($value,$button,$array){
    
    foreach ($array as $type){
        if(isset($_POST[$button])){
            if($_POST[$value]==$type){
                echo "<option selected>$type</option>";
            }else{echo "<option>$type</option>";}
        }else{echo "<option>$type</option>";}
    }
}