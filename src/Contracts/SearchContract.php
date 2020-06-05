<?php

namespace Opmvpc\Constructs\Contracts;

use Opmvpc\Constructs\Nodes\Leaf;

/**
 * SearchContract interface
 */
interface SearchContract
{
    public function search($key, ?Leaf $leaf): ?Leaf;

    public function min(): ?Leaf;

    public function max(): ?Leaf;

    public function successor(Leaf $leaf): ?Leaf;
}
