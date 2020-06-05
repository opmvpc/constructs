<?php

namespace Opmvpc\Constructs\Threes\Heaps;

use Opmvpc\Constructs\Contracts\ThreeContract;
use Opmvpc\Constructs\Nodes\SimpleNode;
use Opmvpc\Constructs\Threes\Heap;
use OutOfBoundsException;

/**
 * Mutable ArrayHeap
 * clé triées en fonction de la valeur
 * farall i, j | 0 < i < j < n , elements[i] > elements[j]
 */
final class ArrayHeap extends Heap
{

    /**
     * Base constructor
     */
    private function __construct()
    {
        $this->size = 0;
        $this->elements = [];
        $this->elements[0] = null;
    }

    /**
     * Create a new Empty ThreeContract
     *
     * @return ThreeContract
     */
    public static function make(): ThreeContract
    {
        return new ArrayHeap();
    }

    /**
     * Size of the list
     *
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * Ajoute un element dans le heap
     * size augmente de 1
     *
     * @param object $item
     *
     * @return ThreeContract
     */
    public function add($item): ThreeContract
    {
        $this->elements[] = SimpleNode::make($item);
        $this->size += 1;

        $this->heapify();

        return $this;
    }

    /**
     * Retire un item s'il est présent dans le heap,
     * sinon renvoie OutOfBoundException
     * size diminue de 1
     *
     * @param ThreeContract $item
     *
     * @throws OutOfBoundsException
     *
     * @return ThreeContract
     */
    public function remove($item): ThreeContract
    {
        $key = $this->findFirstIndex(SimpleNode::make($item));
        if ($key !== null) {
            unset($this->elements[$key]);
            $this->elements = array_values((array) $this->elements);
            $this->size -= 1;
            $this->heapify();
        } else {
            throw new OutOfBoundsException('Constructs ArrayList.remove()');
        }

        return $this;
    }

    /**
     * Get element positionned at elements[$i]
     *
     * @param int $i
     *
     * @return SimpleNode|null
     */
    public function get(int $i): ?SimpleNode
    {
        try {
            return $this->elements[$i];
        } catch (\Throwable $exception) {
            $message = 'Constructs ArrayList.get() ';
            $message .= $exception->getMessage();

            throw new OutOfBoundsException($message);
        }
    }

    /**
     * Get structures items as an array
     *
     * @return array<int, SimpleNode|null>
     */
    public function toArray(): array
    {
        $array = [];

        for ($i = 1; $i <= $this->size; $i++) {
            $array[] = $this->elements[$i]['value'];
        }

        return $array;
    }

    /**
     * siftDown
     *
     * si le fils gauche elements[2i] > elements[i] => swap(2i, i)
     * si le fils droit elements[2i+1] > elements[i] => swap(2i+1, i)
     * sinon on stop
     *
     * @param int $i
     *
     * @return void
     */
    public function siftDown(int $i): void
    {
        $currentItemValue = $this->elements[$i]['value'];
        $child = 2 * $i;

        if ($child > $this->size) {
            return;
        }
        if ($this->elements[$child]['value'] > $currentItemValue) {
            $this->swap($child, $i);
            $this->siftDown($child);
        }

        if ($child + 1 > $this->size) {
            return;
        }
        if ($this->elements[$child + 1]['value'] > $currentItemValue) {
            $this->swap($child + 1, $i);
            $this->siftDown($child + 1);
        }

        return;
    }

    /**
     * Swap two items in containded in $this->elements
     *
     * @param int $first
     * @param int $second
     *
     * @return void
     */
    public function swap(int $first, int $second): void
    {
        $tmp = $this->elements[$first];
        $this->elements[$first] = $this->elements[$second];
        $this->elements[$second] = $tmp;
    }

    /**
     * returns the key of the first item matching parameter value
     *
     * @param SimpleNode $item
     *
     * @return int|null
     */
    private function findFirstIndex(SimpleNode $item): ?int
    {
        foreach ($this->elements as $key => $element) {
            if ($element !== null) {
                if ($item['value'] === $element['value']) {
                    return $key;
                }
            }
        }

        return null;
    }
}
