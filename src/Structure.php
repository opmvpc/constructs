<?php

namespace Opmvpc\Constructs;

abstract class Structure
{
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
