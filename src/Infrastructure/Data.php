<?php
namespace Infrastructure;

define('LAZER_DATA_PATH', realpath(__DIR__).'/data/'); //Path to folder with tables

use Lazer\Classes\Database as Lazer;
use Domain\DataInterface;
use Infrastructure\Fees;

class Data implements DataInterface {

    public static function getGrossRevenue($timestamp){
        // returns: all positive revenue, after provided timestamp, as integer
        // $timestamp is seconds since epoch
        $rows = Lazer::table('transactions')
                ->where('timestamp', '>', $timestamp)
                ->where('amount', '>', '0')
                ->findAll()
                ->asArray();
        $sum = 0;
        foreach($rows as $row){
            $sum += $row['amount'];
        }
        return $sum;
    }

    public static function getExpenses($timestamp){
        // returns: all negative revenue, after provided timestamp, as integer.

        $rows = Lazer::table('transactions')
                ->where('timestamp', '>', $timestamp)
                ->where('amount', '<=', '0')
                ->findAll()
                ->asArray();
        $sum = 0;
        foreach($rows as $row){
            $sum += $row['amount'];
        }
        return $sum;
    }
    public static function getFrozenMoney($timestamp){
        // returns: transactions that are:
        //              insured
        //              still within insurance period
        //              after provided timestamp
        //      as negative integer.
    
        // sum all positive money still within insurance period
        $rows = Lazer::table('transactions')
                ->where('timestamp', '>', $timestamp)
                ->where('insured', '=', True)
                ->findAll()
                ->asArray();
        $sum = 0;
        $ids = array();
        foreach($rows as $row){
            if ( $row['timestamp'] + strtotime("{$row['insured_days']} days") > time() ){ // still frozen
                switch( $row['t_type'] ){
                    case 'sale':    // frozen = 80%
                        $sum += $row['amount'] * 0.8;
                        break;
                    case 'pickup':  // freeze the pickups, not the reservations, for simplicity
                    case 'return':  // frozen = -(amount)
                        $sum += $row['amount'];
                        break;
                    default:
                        break;
                }
            }
        }
        return $sum;
    }

    public static function getNetRevenue($timestamp){
        // returns: gross - frozen - expenses
        return ( Data::getGrossRevenue($timestamp)
                    - Data::getFrozenMoney($timestamp)
                    + Data::getExpenses($timestamp) );
    }

    public static function dropTable($tname){
        // drop table if exists, otherwise do nothing
        if (Data::tableExists($tname)){
            Lazer::remove($tname);
        }
    }

    public static function tableExists($tname){
        // returns: True if table exists in database
        try{
            \Lazer\Classes\Helpers\Validate::table($tname)->exists();
            return True;
        } catch(\Lazer\Classes\LazerException $e){
            return False;
        }
    }

    public static function fixtures(){
        // pre-load database

        // drop
        Data::dropTable('transactions');
        // create 'transactions' table
        Lazer::create('transactions', array(
            'customer_id'   => 'integer'
            ,'inventory_id' => 'integer' 
            ,'t_type'       => 'string'
            ,'timestamp'    => 'string'     // seconds since epoch
            ,'amount'       => 'integer'
            ,'insured'      => 'boolean'
            ,'insured_days'  => 'integer'
        ));
        // fill table
        $row = Lazer::table('transactions');
        $row->customer_id     = 1;
        $row->inventory_id    = 1;
        $row->t_type          = 'chip';
        $row->timestamp       = '1565361692';
        $row->amount          = Fees::$chip;
        $row->insured         = False;
        $row->insured_days     = 0;
        $row->save();
        //
        $row = Lazer::table('transactions');
        $row->customer_id     = 9;
        $row->inventory_id    = 9;
        $row->t_type          = 'sale';
        $row->timestamp       = '1565361192';
        $row->amount          = 30000;
        $row->insured         = False;
        $row->insured_days     = 0;
        $row->save();
        //
        $row = Lazer::table('transactions');
        $row->customer_id       = 2;
        $row->inventory_id      = 3;
        $row->t_type            = 'sale';
        $row->timestamp         = '1565448092';
        $row->amount            = 50000;
        $row->insured           = True;
        $row->insured_days      = 90;
        $row->save();
        //
        $row = Lazer::table('transactions');
        $row->customer_id     = 3;
        $row->inventory_id    = 4;
        $row->t_type          = 'reserve';
        $row->timestamp       = '1565534492';
        $row->amount          = 20000; // 20% * 50,000  + (10,000 insurance)
        $row->insured         = True;
        $row->insured_days     = 90;
        $row->save();
        //
        $row = Lazer::table('transactions');
        $row->customer_id     = 3;
        $row->inventory_id    = 4;
        $row->t_type          = 'pickup';
        $row->timestamp       = '1565534493';
        $row->amount          = 40000;  // 80% * 50,000    remainder of price
        $row->insured         = True;
        $row->insured_days     = 90;
        $row->save();
        //
        $row = Lazer::table('transactions');
        $row->customer_id     = 3;
        $row->inventory_id    = 4;
        $row->t_type          = 'return';
        $row->timestamp       = '1565620892';
        $row->amount          = -40000; // 80% * 50,000     cash back
        $row->insured         = True;
        $row->insured_days     = 90;
        $row->save();
    }
}

?>
