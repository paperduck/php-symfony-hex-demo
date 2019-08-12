<?php

namespace Infrastructure;

use Domain\BusinessCalendarInterface;

class BusinessCalendar implements BusinessCalendarInterface {

    public static $insuranceLengthInDays = 90; // e.g. 90 days for 3 months
    //public static $openDays = array{}; // list of days of week (MON - FRI)
    //public static $businessHours; // key-val array, e.g. {MON:{open:9AM, close:9pm}, ...}


    public static function getReportPeriodStart(){
        // returns: DateTime of start of current report period
        return strtotime("last friday midnight");
    }

    public static function isBusinessOpen(){
        throw new Exception('Not implemented');
    }

}

?>
