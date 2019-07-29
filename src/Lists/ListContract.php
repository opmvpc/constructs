<?php

namespace Opmvpc\Structures\Lists;

/**
 * List interface
 */
interface ListContract {
    public function size() : int;
    public function contains(Item $item) : bool;
    public function add(Item $item) : void;
    public function remove(Item $item) : void;
    public function get(int $i) : Item;
}
