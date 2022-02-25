<?php

// prefix word for file name and id
function prefix_word($name, $num) {
    return str_pad($name, $num, '0', STR_PAD_LEFT);
 }