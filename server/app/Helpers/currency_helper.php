<?php
if (! function_exists('hi')) {
    function hi(){
        return "hello world";
    }
}
if (! function_exists('convertAmountToWords')) {
    function convertAmountToWords($amount)
{
    $ones = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine'
    );

    $tens = array(
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety'
    );

    $amount = number_format($amount, 2, '.', ''); // Format amount with 2 decimal places

    list($dollars, $cents) = explode('.', $amount); // Split dollars and cents

    $dollarsInWords = '';
    if ($dollars > 0) {
        if ($dollars < 10) {
            $dollarsInWords = $ones[$dollars];
        } elseif ($dollars < 20) {
            $dollarsInWords = $tens[$dollars];
        } elseif ($dollars < 100) {
            $dollarsInWords = $tens[($dollars / 10) * 10];
            $remainder = $dollars % 10;
            if ($remainder > 0 && array_key_exists($remainder, $ones)) {
                $dollarsInWords .= '-' . $ones[$remainder];
            }
        }
        $dollarsInWords .= ' dollar' . ($dollars != 1 ? 's' : '');
    }

    $centsInWords = '';
    if ($cents > 0) {
        if (array_key_exists($cents, $ones)) {
            $centsInWords = $ones[$cents];
        } elseif (array_key_exists($cents, $tens)) {
            $centsInWords = $tens[$cents];
        } elseif ($cents < 100) {
            $tensKey = floor($cents / 10) * 10;
            $onesKey = $cents % 10;

            if (array_key_exists($tensKey, $tens)) {
                $centsInWords = $tens[$tensKey];

                if ($onesKey > 0 && array_key_exists($onesKey, $ones)) {
                    $centsInWords .= '-' . $ones[$onesKey];
                }
            }
        }

        $centsInWords .= ' cent' . ($cents != 1 ? 's' : '');
    }

    $result = trim($dollarsInWords . ' ' . $centsInWords);
    return ucwords($result); // Capitalize the first letter of each word
}

    
}