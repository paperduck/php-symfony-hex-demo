
ARCHITECTURE
-------------------------------------------------------------------------------
Symfony for testing framework
Composer for PHP package management

LAYERS
-------------------------------------------------------------------------------

DOMAIN LAYER
    core layer
    no libraries/frameworks
    needed objects/values to express domain
    define interfaces provided by outer layerS

APPLICATION LAYER
    classes to implement use cases
    leverages domain layer

INFRASTRUCTURE LAYER
    implement interfaces in domain & app layer (persistance, notifications, blob  storage, etc.)

CLIENT/FRAMEWORK LAYER
    outermost layer
    console worker app
    user interacts with this layer
    pulls uses case exposed by app layer


USE CASES
-------------------------------------------------------------------------------
Weekly revenue report

List showroom pets

Friday notification
    - list of pets going to vet
    - list of customers to contact

Occupancy report


TESTING
-------------------------------------------------------------------------------
https://getcomposer.org/download/

# HOW TO BUILD



# HOW TO USE

List available commands (and other info):

    $ cd hex_pet_shop
    $ php main.php list

Show "hello world":

    $ cd hex_pet_shop
    $ php main.php revenue
