<?php

namespace Opmvpc\Constructs\Lists;

use Opmvpc\Constructs\Nodes\Item;
use Opmvpc\Constructs\Lists\ListContract;

/**
 * Array based List implementation
 */
class ArrayList implements ListContract
{
    /**
     * Elements List
     *
     * @var array
     */
    private $elements;

    /**
     * Base constructor
     */
    public function __construct()
    {
        $this->elements = [];
    }

    public function size() : int
    {
        return 0;
    }

    public function contains(Item $item) : bool
    {
        return false;
    }

    public function add(Item $item) : void
    {
    }

    public function remove(Item $item) : void
    {
    }

    public function get(int $i) : Item
    {
        return new Item(0);
    }
}
