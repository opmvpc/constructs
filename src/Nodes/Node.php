<?php

namespace Opmvpc\Constructs\Nodes;

use ArrayAccess;

abstract class Node implements ArrayAccess
{
    /**
     * @var array
     */
    protected $container = [];

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
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

    /**
     * @return $this
     */
    public function dump()
    {
        dump($this);

        return $this;
    }
}
