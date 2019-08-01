<?php

namespace Opmvpc\Constructs\Nodes;

final class SimpleNode extends Node
{
    private function __construct($value) {
        $this->container = [
            "value" => $value,
        ];
    }

    public static function make($item)
    {
        return new SimpleNode($item);
    }
}
