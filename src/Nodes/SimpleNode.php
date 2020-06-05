<?php

namespace Opmvpc\Constructs\Nodes;

final class SimpleNode extends Node
{
    private function __construct($value)
    {
        $this->container = [
            "value" => $value,
        ];
    }

    /**
     *
     * @param mixed $item
     * @return SimpleNode
     */
    public static function make($item)
    {
        return new SimpleNode($item);
    }
}
