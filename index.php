<?php

include "./AutoIncText.php";

function sql_ret()
{
    $ret_arr =  array(
        0 => "The following array_rotate() function uses array_merge and array_shift to reliably rotate an array forwards or backwards, preserving keys. If you know you can trust your array to be an array and shift to be between 0 and the length of your array, you can skip the function definition and use just the return expression in your code.",
        1 => "Function to pretty print arrays and objects. Detects object recursion and allows setting a maximum depth. Based on arraytostring and u_print_r from the print_r function notes. Should be called like so:",
        2 => "Text2"
    );

    return $ret_arr;
}



function renderPDF($auto_inc_text)
{
    $pdf = "Header del PDF\n".$auto_inc_text->texto('TEXTO7')."\nusing heredoc syntax\n";
    echo $pdf;
}

$textos = sql_ret();
$my_inc = new AutoIncText(7, "TEXTO", $textos);
renderPDF($my_inc);
echo count($textos);
