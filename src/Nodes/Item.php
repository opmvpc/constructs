<?php

namespace Opmvpc\Constructs\Nodes;

/**
 * Item of a List
 */
class Item {

    /**
     * Item Value
     *
     * @var object
     */
    private $value;

    /**
     * Base constructor
     *
     * @param $value
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * Get magic method
     * return Item propertie value
     *
     * @param [string] $var_name
     * @return $var_name
     */
    public function __get($var_name){
        return $this->$var_name;
    }

}
