<?php
namespace Domain;

interface BusinessCalendarInterface{

    public static function getReportPeriodStart();
    public static function isBusinessOpen();
}

?>
