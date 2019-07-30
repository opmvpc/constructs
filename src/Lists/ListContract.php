<?php

namespace Opmvpc\Constructs\Lists;

/**
 * List interface
 */
interface ListContract {
    public static function make() : ListContract;
    public function size() : int;
    public function contains($item) : bool;
    public function add($item) : ListContract;
    public function remove($item) : ListContract;
    public function get(int $i);
    public function toArray() : array;
}
