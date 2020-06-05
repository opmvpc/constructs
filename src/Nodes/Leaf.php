<?php

namespace Opmvpc\Constructs\Nodes;

use Opmvpc\Constructs\Contracts\NodeContract;

final class Leaf extends Node
{
    private function __construct($key, $value = null, NodeContract $parent = null)
    {
        $this->container = [
            "parent" => $parent,
            "left" => null,
            "right" => null,
            "key" => $key,
            "value" => $value,
        ];
    }

    public static function make($key, $value = null, NodeContract $parent = null): Leaf
    {
        return new Leaf($key, $value, $parent);
    }

    public function key()
    {
        return $this['key'];
    }

    public function parent(): ?Leaf
    {
        return $this['parent'];
    }

    public function left(): ?Leaf
    {
        return $this['left'];
    }

    public function right(): ?Leaf
    {
        return $this['right'];
    }

    public function value()
    {
        return $this['value'];
    }

    public function compareTo(Leaf $leaf)
    {
        return $this->key() <=> $leaf->key();
    }
}
