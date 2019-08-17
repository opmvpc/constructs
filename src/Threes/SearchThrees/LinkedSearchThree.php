<?php

namespace Opmvpc\Constructs\Threes\SearchThrees;

use Opmvpc\Constructs\Threes\Three;
use Opmvpc\Constructs\Contracts\NodeContract;
use Opmvpc\Constructs\Contracts\SearchContract;
use Opmvpc\Constructs\Contracts\ThreeContract;

class LinkedSearchThree extends Three implements SearchContract
{
    private function __construct() {
        $this->root = null;
    }

    public static function make(): ThreeContract
    {
        return new LinkedSearchThree();
    }

    public function keys(): array
    {
        return [];
    }

    /**
     * L'arbre doit avoir ses clés triées par ordre croissant
     * si on effectue un parcours infixe
     *
     * @return boolean
     */
    public function repOk(): bool
    {
        $array = $this->keysArray();
        $arrayToSort = $array;
        sort($arrayToSort);

        for ($i=0; $i < count($array); $i++) {
            if ($array[$i] !== $arrayToSort[$i]) {
                return false;
            }
        }

        return true;
    }
}
