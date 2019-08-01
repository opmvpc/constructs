<?php

namespace Opmvpc\Constructs\Contracts;

use Opmvpc\Constructs\Nodes\SimpleNode;

/**
 * ThreeContract interface
 */
interface ThreeContract
{
    public static function make(): ThreeContract;
    public function size(): int;
    public function add($item): ThreeContract;
    public function remove($item): ThreeContract;
    public function get(int $i): SimpleNode;
    public function toArray(): array;
}
