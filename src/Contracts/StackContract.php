<?php

namespace Opmvpc\Constructs\Contracts;

/**
 * List interface
 */
interface StackContract
{
    public static function make(): StackContract;
    public function isEmpty(): bool;
    public function push($item): StackContract;
    public function pop(): StackContract;
    public function top();
    public function toArray(): array;
}
