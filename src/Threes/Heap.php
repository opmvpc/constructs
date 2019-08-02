<?php

namespace Opmvpc\Constructs\Threes;

use Opmvpc\Constructs\Contracts\ThreeContract;
use Opmvpc\Constructs\Structure;

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
            $currentItemValue = $this->elements[$i]['value'];
            $child = $i * 2;

            if ($child > $this->size) {
                continue;
            } if ($this->elements[$child]['value'] > $currentItemValue) {
                return false;
            }

            if ($child + 1 > $this->size) {
                continue;
            } if ($this->elements[$child + 1]['value'] > $currentItemValue) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks representation invariant
     *
     * @return bool
     */
    protected function repOk(): bool
    {
        if (! $this->isHeapified()) {
            return false;
        }

        return true;
    }

    /**
     * Permute elements[1] et elements[size-1]
     * Puis, pour chaque Ã©lement
     *
     * @return void
     */
    protected function heapify(): void
    {
        if ($this->size === 0) {
            return;
        }

        for ($i = $this->size; $i > 0; $i--) {
            $this->swap(1, $i);
            $this->siftDown($i);
        }
    }
}
