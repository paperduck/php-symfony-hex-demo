<?php
namespace Client;

use Infrastructure\Services;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;

class CommandBus {
    // Implements command bus between ports and command implementations.

    public function reportRevenueCommand(){ Services::reportRevenue(); }

}

?>
