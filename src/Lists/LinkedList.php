<?php

namespace Opmvpc\Constructs\Lists;

use BadMethodCallException;
use Opmvpc\Constructs\Contracts\ListContract;
use Opmvpc\Constructs\Nodes\LinkedNode;
use Opmvpc\Constructs\Structure;
use OutOfBoundsException;

/**
 * Mutable LinkedList
 */
final class LinkedList extends Structure implements ListContract
{
    /**
     * Head of LinkedList
     *
     * @var LinkedNode
     */
    private $head;

    /**
     * List size
     *
     * @var int
     */
    private $size;

    /**
     * Base constructor
     */
    private function __construct()
    {
        $this->head = null;
        $this->size = 0;
    }

    /**
     * Create a new Empty LinkedList
     *
     * @return ListContract
     */
    public static function make(): ListContract
    {
        return new LinkedList();
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
     * si item existe dans la liste, renvoie true,
     * sinon renvoie false
     *
     * @param $item
     *
     * @return bool
     */
    public function contains($item): bool
    {
        $currentItem = $this->head;
        for ($i=0; $i < $this->size; $i++) {
            if ($currentItem->getValue() === $item) {
                return true;
            }
            $currentItem = $currentItem->getNext();
        }
        return false;
    }

    /**
     * Ajoute un element a la fin de la liste
     * size augmente de 1
     *
     * @param $item
     *
     * @return ListContract $this
     */
    public function add($item): ListContract
    {
        $newNode = new LinkedNode($item);
        $this->size += 1;

        if (is_null($this->head)) {
            $this->head = $newNode;
            return $this;
        }

        $currentItem = $this->head;
        while ($currentItem->getNext() !== null) {
            $currentItem = $currentItem->getNext();
        }

        $currentItem->setNext($newNode);

        return $this;
    }

    /**
     * @throws BadMethodCallException
     *
     * @param $item
     *
     * @return ListContract $this
     */
    public function remove($item = null): ListContract
    {
        $item;
        throw new BadMethodCallException('Unsupported Operation');

        return $this;
    }

    /**
     * Get element positionned at elements[$i]
     *
     * @requires 0 <= $index < $this->size()
     *
     * @param int $index
     *
     * @return $value
     */
    public function get(int $index)
    {
        $currentItem = $this->head;

        for ($i=0; $i <= $index; $i++) {
            if (is_null($currentItem)) {
                throw new OutOfBoundsException('Constructs ArrayList.get()');
                return;
            }

            if ($i === $index) {
                return $currentItem->getValue();
            }

            $currentItem = $currentItem->getNext();
        }
    }

    /**
     * Get structures items as an array
     *
     * @return array $array
     */
    public function toArray(): array
    {
        $array = [];
        $currentItem = $this->head;
        $array[] = $currentItem->getValue();

        while ($currentItem->getNext() !== null) {
            $currentItem = $currentItem->getNext();
            $array[] = $currentItem->getValue();
        }

        return $array;
    }
}
