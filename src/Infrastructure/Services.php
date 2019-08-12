<?php
namespace Infrastructure;

use Infrastructure\Data;
use Application\ServicesInterface;
use Infrastructure\BusinessCalendar;

class Services implements ServicesInterface {
    // Implement use cases.

    public function reportRevenue() {
        Data::fixtures(); // Reset database. Delete as needed.
    
        $start = BusinessCalendar::getReportPeriodStart(); // most recent friday's midnight
        $gross = Data::getGrossRevenue($start);
        $expenses = Data::getExpenses($start);
        $frozen = Data::getFrozenMoney($start);
        $net = Data::getNetRevenue($start);
        $start_human = date('Y-m-d', $start);
        $message = "Revenue Report since $start_human midnight:\n"
            ."    gross:     $gross\n"
            ."    expenses:  $expenses\n"
            ."    frozen:    $frozen\n"
            ."    net:       $net\n\n";
        echo $message;
    }


    public static function doTransaction($t_type, $amount, $isInsured, $insuranceLengthInDays){
        throw new Exception('Not implemented');
    }


    public function getShowroomPets(){
        /*
        returns: items in inventry db that:
                   have type Pet,Cat, or Bird
                   have not been reserved
        AutoAddChipPets(); // mark pets as chipped beforehand
        */
        throw new Exception('Not implemented');
    }


    public function readNotifications(){
        throw new Exception('Not implemented');
    }

    public function warnNotifications(){
        throw new Exception('Not implemented');
    }

    public function reportOccupancy(){
        throw new Exception('Not implemented');
    }

    public function getListPetsToBeChipped() {
        /*
         items that:  have category cat or dog
                       are reserved
         call AutoAddChipPets
        */
        throw new Exception('Not implemented');
    }

    public function scheduleNotifications() {
         /*
            Check database to see when last notification was.
            If more than 1 week old, insert a new unread notification into 
            notification table.
        */
        throw new Exception('Not implemented');
    }

    public function occupancyReport(){
        /*
            how many cats/dogs/birds to buy = 
              (slots in showroom - pets in showroom)
              + (slots in backroom - pets in backroom)
              - (insured pets sold in past 3 months)
        */
        throw new Exception('Not implemented');
    }


}
?>
