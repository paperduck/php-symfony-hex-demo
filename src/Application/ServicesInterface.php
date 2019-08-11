<?php

namespace Application;

interface ServicesInterface {

    // Get values from user, save to transactions table
    public static function doTransaction($t_type, $amount, $isInsured, $insuranceLengthInDays);

    public function reportRevenue();            
    public function getShowroomPets();        
    public function readNotifications();      
    public function warnNotifications();      
    public function reportOccupancy();        

    public function getListPetsToBeChipped();
    public function scheduleNotifications();

    public function occupancyReport();


 }

?>
