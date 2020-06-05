<?php

namespace Opmvpc\Constructs\Threes;

use Opmvpc\Constructs\Structure;
use Opmvpc\Constructs\Nodes\SimpleNode;
use Opmvpc\Constructs\Contracts\ThreeContract;

abstract class Heap extends Structure implements ThreeContract
{
    /**
     * List size
     *
     * @var int
     */
    protected $size;

    /**
     *  Elements List
     *
     * @var array<int, SimpleNode|null>
     */
    protected $elements;

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
            }
            if ($this->elements[$child]['value'] > $currentItemValue) {
                return false;
            }

            if ($child + 1 > $this->size) {
                continue;
            }
            if ($this->elements[$child + 1]['value'] > $currentItemValue) {
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
    public function repOk(): bool
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

    abstract public function swap(int $first, int $second): void;

    abstract public function siftDown(int $i): void;
}
