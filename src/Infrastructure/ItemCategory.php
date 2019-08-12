<?php

namespace Infrastrcuture

class ItemCategory {
    // just an enumeration to sanitize input. PHP Interfaces don't allow member
    //  variables, so only exists in Infrastructure.
    public static $categories; // something like  {'Cat':1, 'Dog':2, 'Bird':3, 'Toy':4]
}

?>
