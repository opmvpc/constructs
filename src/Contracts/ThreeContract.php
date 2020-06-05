<?php

namespace Opmvpc\Constructs\Contracts;

/**
 * ThreeContract interface
 */
interface ThreeContract
{
    public static function make(): ThreeContract;
    public function remove($item): ThreeContract;
    public function toArray(): array;
}
