<?php

namespace Domain;

interface DataInterface{

    public static function getGrossRevenue($timestamp); 
    public static function getExpenses($timestamp);
    public static function getFrozenMoney($timestamp);
    public static function getNetRevenue($timestamp);

    public static function dropTable($tname);
    public static function tableExists($tname);
    public static function fixtures();
}

?>

