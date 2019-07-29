<?php

namespace Opmvpc\Structures\Lists;

use Opmvpc\Structures\Nodes\Item;
use Opmvpc\Structures\Lists\ListContract;

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
