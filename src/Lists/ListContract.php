<?php

namespace Opmvpc\Constructs\Lists;

/**
 * List interface
 */
interface ListContract {
    public function size() : int;
    public function contains($item) : bool;
    public function add($item) : void;
    public function remove($item) : void;
    public function get(int $i);
    public function toArray() : array;
}
