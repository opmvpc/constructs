<?php

namespace Opmvpc\Constructs\Stacks;

use Opmvpc\Constructs\Contracts\StackContract;
use Opmvpc\Constructs\Nodes\LinkedNode;
use Opmvpc\Constructs\Structure;
use OutOfBoundsException;

/**
 * Array based List implementation
 */
final class LinkedStack extends Structure implements StackContract
{
    /**
     * Head of the Stack
     *
     * @var LinkedNode
     */
    private $head;

    /**
     * Base constructor
     */
    private function __construct()
    {
        $this->head = null;
    }

    /**
     * Create a new Empty LinkedList
     *
     * @return LinkedStack
     */
    public static function make(): StackContract
    {
        return new LinkedStack();
    }

    /**
     * Return true if stack is empty,
     * else return false
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return is_null($this->head) ?? false ;
    }

    /**
     * Push an item at the top of the stack
     *
     * @param [type] $item
     *
     * @return ArrayStack
     */
    public function push($item): StackContract
    {
        $newNode = new LinkedNode($item);

        if (is_null($this->head)) {
            $this->head = $newNode;

            return $this;
        }

        $newNode->setNext($this->head);
        $this->head = $newNode;

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
        if ($this->isEmpty()) {
            throw new OutOfBoundsException('Constructs LinkedStack.pop()');

            return $this;
        }

        $newHead = $this->head->getNext();
        $this->head = $newHead;

        return $this;
    }

    /**
     * Return the item at the top of the stack
     *
     * @throws OutOfBoundsException
     *
     * @return [Type] $item
     */
    public function top()
    {
        if ($this->isEmpty()) {
            throw new OutOfBoundsException('Constructs ArrayStack.top()');
        }

        return $this->head->getValue();
    }

    /**
     * Get structures items as an array
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];
        if (is_null($this->head)) {
            return $array;
        }

        $currentItem = $this->head;
        $array[] = $currentItem->getValue();

        while ($currentItem->getNext() !== null) {
            $currentItem = $currentItem->getNext();
            $array[] = $currentItem->getValue();
        }

        return array_reverse($array);
    }
}
