<?php

namespace Opmvpc\Constructs\Stacks;

/**
 * List interface
 */
interface StackContract {
    public function isEmpty() : bool;
    public function push($item);
    public function pop();
    public function top();
    public function toArray() : array;
}
