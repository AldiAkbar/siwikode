<?php

function create_slug($str)
{
    $illegal_string = [
        " ", "?", "!", "(", ")", "^", "$", "#", "@", "{", "}", "+", "[", "]", "/", "'\'",
        "<", ">", ";", ":", "|", "'", '"', ",", "`", "*", "%"
    ];
    return str_replace($illegal_string, "-", $str);
}
