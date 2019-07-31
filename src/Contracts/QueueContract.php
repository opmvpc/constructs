<?php

namespace Opmvpc\Constructs\Contracts;

/**
 * List interface
 */
interface QueueContract
{
    public static function make(): QueueContract;
    public function isEmpty(): bool;
    public function enqueue($item): QueueContract;
    public function dequeue();
    public function peek();
    public function toArray(): array;
}
