<?php
namespace App\Http\Controllers\Tools;

class Persian
{
    static function convertToPersianNumber($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($num,$persian, $string);

        return $convertedPersianNums;
    }
}
