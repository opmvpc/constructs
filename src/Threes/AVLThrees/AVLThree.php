<?php

namespace Opmvpc\Constructs\Threes\AVLThrees;

use Opmvpc\Constructs\Contracts\SearchContract;
use Opmvpc\Constructs\Contracts\ThreeContract;
use Opmvpc\Constructs\Threes\Three;

class AVLThree extends Three implements SearchContract
{
    private function __construct()
    {
        $this->root = null;
    }

    public static function make(): ThreeContract
    {
        return new AVLThree();
    }
}
