<?php
namespace App\Http\Controllers\Days;
class Day
{
    public $solar;
    public $lunar;
    public $georgian;
    public $holiday;
    public $comment;
    function __construct($solar, $lunar, $georgian) {
        $this->solar = $solar;
        $this->lunar = $lunar;
        $this->georgian = $georgian;
        $comment = "";
        $holiday = false;
    }
}
