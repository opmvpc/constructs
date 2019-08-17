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

    /**
     * L'arbre doit avoir ses clés triées par ordre croissant
     * si on effectue un parcours infixe.
     *
     * L'arbre ne peux pas avoir un noeud dont les sous arbnres
     * ont une différence de hauteur de plus de deux
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
