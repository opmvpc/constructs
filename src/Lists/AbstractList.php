<?php

namespace Opmvpc\Constructs\Lists;

use Opmvpc\Constructs\Lists\ListContract;

abstract class AbstractList implements ListContract
{
    abstract public static function make() : ListContract;
    abstract public function size() : int;
    abstract public function contains($item) : bool;
    abstract public function add($item) : ListContract;
    abstract public function remove($item) : ListContract;
    abstract public function get(int $i);
    abstract public function toArray() : array;
    // abstract public static function deepCopy();
}
