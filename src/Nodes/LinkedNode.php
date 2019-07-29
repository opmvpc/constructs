<?php

namespace Opmvpc\Constructs\Nodes;

/**
 * Node of a List
 */
class LinkedNode {

    /**
     * Item Value
     *
     * @var var
     */
    private $value;

    /**
     * Next Node in the list
     *
     * @var LinkedNode
     */
    private $next;

    /**
     * Base constructor
     *
     * @param $value
     */
    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext(LinkedNode $next) : void
    {
        $this->next = $next;
    }

}
