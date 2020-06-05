<?php

namespace Opmvpc\Constructs\Stacks;

use Opmvpc\Constructs\Contracts\StackContract;
use Opmvpc\Constructs\Structure;
use OutOfBoundsException;

/**
 * Array based List implementation
 */
final class ArrayStack extends Structure implements StackContract
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
    private function __construct()
    {
        $this->size = 0;
        $this->elements = [];
    }

    /**
     * Create a new Empty LinkedList
     *
     * @return ArrayStack
     */
    public static function make(): StackContract
    {
        return new ArrayStack();
    }

    /**
     * Size of the list
     *
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * Return true if stack is empty,
     * else return false
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size === 0;
    }

    /**
     * Push an item at the top of the stack
     *
     * @param mixed $item
     *
     * @return ArrayStack
     */
    public function push($item): StackContract
    {
        $this->size += 1;

        array_push($this->elements, $item);

        return $this;
    }

    /**
     * Pop the item at the top of the stack
     *
     * @throws OutOfBoundsException
     *
     * @return ArrayStack
     */
    public function pop(): StackContract
    {
        if ($this->size === 0) {
            throw new OutOfBoundsException('Constructs ArrayStack.pop()');
        }

        $this->size -= 1;
        array_pop($this->elements);

        return $this;
    }

    /**
     * Return the item at the top of the stack
     *
     * @throws OutOfBoundsException
     *
     * @return mixed $item
     */
    public function top()
    {
        if ($this->isEmpty()) {
            throw new OutOfBoundsException('Constructs ArrayStack.top()');
        }

        return $this->elements[$this->size - 1];
    }

    /**
     * Get structures items as an array
     *
     * @return array $array
     */
    public function toArray(): array
    {
        $array = [];

        for ($i = 0; $i < $this->size; $i++) {
            $array[] = $this->elements[$i];
        }

        return $array;
    }
}
