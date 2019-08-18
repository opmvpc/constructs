<?php

namespace Opmvpc\Constructs\Threes\SearchThrees;

use Opmvpc\Constructs\Contracts\SearchContract;
use Opmvpc\Constructs\Contracts\ThreeContract;
use Opmvpc\Constructs\Threes\Three;

class LinkedSearchThree extends Three implements SearchContract
{
    private function __construct()
    {
        $this->root = null;
    }

    public static function make(): ThreeContract
    {
        return new LinkedSearchThree();
    }
}
