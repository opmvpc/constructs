<?php

namespace Opmvpc\Constructs\Contracts;

use Opmvpc\Constructs\Nodes\SimpleNode;

/**
 * ThreeContract interface
 */
interface ThreeContract
{
    public static function make(): ThreeContract;
    public function remove($item): ThreeContract;
    public function toArray(): array;
}
