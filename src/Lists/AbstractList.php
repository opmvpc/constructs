<?php

namespace Opmvpc\Constructs\Lists;

use Opmvpc\Constructs\Lists\ListContract;

abstract class AbstractList implements ListContract
{ 
    abstract public function size() : int;
    abstract public function contains($item) : bool;    
    abstract public function add($item) : void;
    abstract public function remove($item) : void;
    abstract public function get(int $i);
    abstract public function toArray() : array;
}
