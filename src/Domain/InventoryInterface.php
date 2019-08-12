<?php

namespace Domain;

interface InventoryInterface{


    public static function reserveItem();           // add a 'reserve' transaction to the database
    public static function addChip();               // when a pet gets chipped
    public static function removeChip();           // if a chip gets removed from a pet

     public static function AutoAddChipPets();     // mark cats & dogs as chipped each week
     public static function ArchiveInventory();    // purges sold items into separate archive table
     public static function ArchiveTransactions(); // purge transactions of certain age

}

?>

