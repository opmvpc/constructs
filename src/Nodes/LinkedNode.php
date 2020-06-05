<?php

namespace Opmvpc\Constructs\Nodes;

/**
 * Node of a List
 */
final class LinkedNode
{

    /**
     *
     * @var mixed
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
    public function __construct($value, ?LinkedNode $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }

    /**
     * Returns contained value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns next node
     *
     * @return self|null
     */
    public function getNext(): ?self
    {
        return $this->next;
    }

    /**
     * Set next node
     *
     * @param LinkedNode $next
     *
     * @return void
     */
    public function setNext(LinkedNode $next): void
    {
        $this->next = $next;
    }
}
