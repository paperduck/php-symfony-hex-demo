<?php

require __DIR__.'/vendor/autoload.php';

use Client\CommandBus;

$client = new CommandBus();
$exit = False;
while (! $exit){
    $line = readline("Enter command. To see options, enter 'help'.   > ");
    echo "";
    switch($line){
        case "q":
        case "quit":
            $exit = True;
            break;
        case "h":
        case "help":
            echo "\nAvailable commands:\n"
                ."    q    quit          Exit the application\n"
                ."    h    help          Display help\n"
                ."    r    revenue       Show revenue report\n"
                ."\n";
            break;
        case "r":
        case "revenue":
            $client->reportRevenueCommand();
            break;
        default:
            echo "Unknown command. To see options, enter 'help'.\n";
    }
}
?>
