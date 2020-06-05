<?php

namespace Opmvpc\Constructs\Nodes;

use ArrayAccess;

abstract class Node implements ArrayAccess
{
    protected $container = [];

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset])
            ? $this->container[$offset]
            : null;
    }

    public function dumpAndDie(): void
    {
        dd($this);
    }

    public function dump()
    {
        dump($this);

        return $this;
    }
}
