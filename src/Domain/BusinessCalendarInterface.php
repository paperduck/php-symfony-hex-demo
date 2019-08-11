<?php
namespace Client;

interface BusinessCalendarInterface{
    public function getReportPeriodStart();

     public static int $insuranceLengthInDays; // e.g. 90 days for 3 months
     public static array $openDays; // list of days of week (MON - FRI)
     public static array $businessHours; // key-val array, e.g. {MON:{open:9AM, close:9pm}, ...}

     public static function getReportPeriodStart(); //  strtotime("last friday midnight")
     public static function isBusinessOpen();
}

?>
