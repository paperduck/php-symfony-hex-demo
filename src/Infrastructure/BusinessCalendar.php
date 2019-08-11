<?php

namespace Infrastructure;

use Domain\BusinessCalendarInterface;

class BusinessCalendar implements BusinessCalendarInterface {

    public function getReportPeriodStart(){
        // returns: DateTime of start of current report period
        echo "hello worlldldld\n";
    }

}

?>
