<?php

// prefix word for file name and id
function prefix_word($name, $num) {
    return str_pad($name, $num, '0', STR_PAD_LEFT);
}

function orderStatus($status){
    if($status == 'Inquiry') {
        return 1; 
    } else if($status == 'Invoice Issued'){
        return 2;
    } else if($status == 'Payment Received'){
        return 3;
    } else if($status == 'Shipping'){
        return 4;
    } else {
        return 5;
    }
}

function decodeStatus($status){
    if($status == 1) {
        return 'Inquiry'; 
    } else if($status == 2){
        return 'Invoice Issued';
    } else if($status == 3){
        return 'Payment Received';
    } else if($status == 4){
        return 'Shipping';
    } else {
        return 'Document';
    }
}