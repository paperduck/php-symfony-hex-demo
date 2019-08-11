<?php

namespace Domain;

interface ItemInterface{
     // CanBeInsured
     public boolean isInsured;
     public int returnDate;      // NULL in db if never returned
     //  CanBeReserved
     public boolean isReserved;  // reads inventory db
     public string customerName;
     public string customerContact;
     //  CanUseChip
     public string chipId;
     public boolean hasChip;
     public int implantDate;  // timestamp or DateTime
     //  Item
     //public ItemCategory category;
     public double price;
     public int transactionDate;
     // Pet
     public string name;
     public int birthday; // or DateTime
     public string showroomDesc;


     public static function AutoAddChipPets();     // mark cats & dogs as chipped each week
     public static function ArchiveInventory();    // purges sold items into separate archive table
     public static function ArchiveTransactions(); // purge transactions of certain age
}
?>

