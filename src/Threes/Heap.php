<?php

namespace Opmvpc\Constructs\Threes;

use Opmvpc\Constructs\Structure;
use Opmvpc\Constructs\Contracts\ThreeContract;

abstract class Heap extends Structure implements ThreeContract
{
    /**
     * Checks if children are lower then parent node
     *
     * @return bool
     */
    protected function isHeapified(): bool
    {
        for ($i = 1; $i <= $this->size; $i++) {
            $child = $i * 2;

            if ($child > $this->size) {
                continue;
            } if ($this->elements[$child]['value'] > $this->elements[$i]['value']) {
                return false;
            }

            if ($child + 1 > $this->size) {
                continue;
            } if ($this->elements[$child + 1]['value'] > $this->elements[$i]['value']) {
                return false;
            }
        }

        return true;
    }
}
