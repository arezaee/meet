<?php
namespace App\Http\Controllers\Days;
use App\Occasion;

class MonthWithDay
{
    public $month;
    public $days;
    function __construct($month) {
        $this->month = $month;
        $this->monthDays();
    }

    private function monthDays()
    {
        $solarWhere = [ ['month', '=', $this->month->month],
                        ['type', '=', 'شمسی'] ];
        $solarOccasions = Occasion::where($solarWhere)->get();

        $lunarWhere = [ ['month', '=', $this->month->first_lunar_month],
                        ['type', '=', 'قمری'],
                        ['day','>=', $this->month->first_lunar_day] ];

        $lunarOccasions = Occasion::where($lunarWhere)->get();

        $last = $this->month->month_day - $this->month->last_lunar_day + $this->month->first_lunar_day -1;
        $lunarWhere2= [ ['month', '=', $this->month->first_lunar_month%12+1],
                        ['type', '=', 'قمری'],
                        ['day','<=',$last] ];

        $lunarOccasions2 = Occasion::where($lunarWhere2)->get();

        $georgianWhere = [ ['month', '=', $this->month->first_georgian_month],
                        ['type', '=', 'میلادی'],
                        ['day','>=', $this->month->first_georgian_day] ];

        $georgianOccasions = Occasion::where($georgianWhere)->get();

        $last = $this->month->month_day - $this->month->last_georgian_day + $this->month->first_georgian_day;
        $georgianWhere2= [ ['month', '=', $this->month->first_georgian_month%12+1],
                        ['type', '=', 'میلادی'],
                        ['day','<=',$last] ];

        $georgianOccasions2 = Occasion::where($georgianWhere2)->get();


        $lunar = $this->month->first_lunar_day;
        $georgian = $this->month->first_georgian_day;

        $this->days=array();

        for($day=1 ; $day<=$this->month->month_day;$day++)
        {
            $this->days[$day] = new Day($day, $lunar, $georgian);

            $lunar = $lunar % $this->month->last_lunar_day + 1;
            $georgian = $georgian % $this->month->last_georgian_day + 1;
        }

        foreach($solarOccasions as $solarOccasion)
        {
            if($solarOccasion->comment!="-")
                $this->days[$solarOccasion->day]->comment .= $solarOccasion->comment;
            $this->days[$solarOccasion->day]->holiday |= $solarOccasion->holiday;
        }

        foreach($lunarOccasions as $lunarOccasion)
        {
            $day = $lunarOccasion->day - $this->month->first_lunar_day + 1;

            $this->days[$day]->comment .= "، ".$lunarOccasion->comment;
            $this->days[$day]->holiday |= $lunarOccasion->holiday;
        }

        foreach($lunarOccasions2 as $lunarOccasion)
        {
            $day = $lunarOccasion->day + $this->month->last_lunar_day - $this->month->first_lunar_day + 1;

            $this->days[$day]->comment .= "، ".$lunarOccasion->comment;
            $this->days[$day]->holiday |= $lunarOccasion->holiday;
        }

        foreach($georgianOccasions as $georgianOccasion)
        {
            $day = $georgianOccasion->day - $this->month->first_georgian_day + 1;

            $this->days[$day]->comment .= "، ".$georgianOccasion->comment;
            $this->days[$day]->holiday |= $georgianOccasion->holiday;
        }

        foreach($georgianOccasions2 as $georgianOccasion)
        {
            $day = $georgianOccasion->day + $this->month->last_georgian_day - $this->month->first_georgian_day + 1;

            $this->days[$day]->comment .= "، ".$georgianOccasion->comment;
            $this->days[$day]->holiday |= $georgianOccasion->holiday;
        }
    }

}
