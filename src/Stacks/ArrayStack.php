<?php

namespace Opmvpc\Constructs\Stacks;

use Opmvpc\Constructs\Stacks\StackContract;
use OutOfBoundsException;

/**
 * Array based List implementation
 */
class ArrayStack implements StackContract
{
    /**
     * List size
     *
     * @var int
     */
    private $size;

    /**
     * Elements List
     *
     * @var array
     */
    private $elements;

    /**
     * Base constructor
     */
    public function __construct() {
        $this->size = 0;
        $this->elements = [];
    }

    /**
     * Size of the list
     *
     * @return integer
     */
    public function size() : int {
        return $this->size;
    }



    /**
     * Get list elements
     *
     * @return array
     */
    public function toArray() : array {
        return $this->elements;
    }
}
