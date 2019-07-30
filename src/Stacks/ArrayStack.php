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
     * Return true if stack is empty,
     * else return false
     *
     * @return boolean
     */
    public function isEmpty() : bool
    {
        return $this->size === 0 ?? false ;
    }

    /**
     * Push an item at the top of the stack
     *
     * @param [type] $item
     * @return ArrayStack
     */
    public function push($item) : ArrayStack
    {
        $this->size += 1;

        array_push($this->elements, $item);

        return $this;
    }

    /**
     * Pop the item at the top of the stack
     *
     * @throws OutOfBoundsException
     * @return ArrayStack
     */
    public function pop() : ArrayStack
    {
        if ($this->size === 0) {
            throw new OutOfBoundsException('Constructs ArrayStack.pop()');
            return $this;
        }

        $this->size -= 1;
        array_pop($this->elements);

        return $this;

    }

    /**
     * Return the item at the top of the stack
     *
     * @throws OutOfBoundsException
     * @return [Type] $item
     */
    public function top()
    {
        if ($this->isEmpty()) {
            throw new OutOfBoundsException('Constructs ArrayStack.top()');
        }

        return $this->elements[$this->size-1];
    }

    /**
     * Get structures items as an array
     *
     * @return array
     */
    public function toArray() : array {
        $array = [];

        for ($i=0; $i < $this->size; $i++) {
            $array[] = $this->elements[$i];
        }

        return $array;
    }
}
