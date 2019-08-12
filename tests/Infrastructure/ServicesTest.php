<?php

// tests  src/Infrastructure/Data.php

namespace Tests\Data;

use Infrastructure\Data;
use Domain\DataInterface;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase {

    // hard-coding values and functions (strtotime) for simplicity
    // Assuming database has default fixture values

    public function testGetGrossRevenue(){
        $d = new Data(); 
        $result = $d->getGrossRevenue(strtotime("last friday midnight"));
        $this->assertEquals(140200, $result);
    }
    public function testExpenses(){
        $d = new Data(); 
        $result = $d->getExpenses(strtotime("last friday midnight"));
        $this->assertEquals(-40000, $result);
    }
    public function testGetFrozenMoney(){
        $d = new Data(); 
        $result = $d->getFrozenMoney(strtotime("last friday midnight"));
        $this->assertEquals(40000, $result);
    }
    public function testGetNetRevenue(){
        $d = new Data(); 
        $result = $d->getNetRevenue(strtotime("last friday midnight"));
        $this->assertEquals(60200, $result);
    }
}

