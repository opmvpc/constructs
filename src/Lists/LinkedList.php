<?php

namespace Opmvpc\Constructs\Lists;

use Opmvpc\Constructs\Lists\AbstractList;
use Opmvpc\Constructs\Nodes\LinkedNode;
use PHPUnit\Framework\MockObject\BadMethodCallException;

class LinkedList extends AbstractList
{
    /**
     * Head of LinkedList
     *
     * @var LinkedNode
     */
    private $head;

    private $size;

    /**
     * Base constructor
     */
    public function __construct() {
        $this->head = null;
        $this->size = 0;
    }

    /**
     * Size of the list
     *
     * @return integer
     */
    public function size() : int
    {
        return $this->size;
    }

    /**
     * si item existe dans la liste, renvoie true,
     * sinon renvoie false
     *
     * @param $item
     * @return boolean
     */
    public function contains($item) : bool
    {
        $currentItem = $this->head;
        for ($i=0; $i < $this->size; $i++) { 
            if ($currentItem->getValue() == $item) {
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
     * @return void
     */
    public function add($item) : void
    {
        $newNode = new LinkedNode($item);
        $this->size += 1;

        if (is_null($this->head)) {
            $this->head = $newNode;
            return;
        }

        $currentItem = $this->head;
        while ($currentItem->getNext() !== null) {
            $currentItem = $currentItem->getNext();
        }
        $currentItem->setNext($newNode);
    }

    /**
     * @throws BadMethodCallException
     *
     * @param $item
     * @return void
     */
    public function remove($item) : void
    {
        throw new BadMethodCallException('Unsupported Operation');
    }

    /**
     * Get element positionned at elements[$i]
     * 
     * @requires 0 <= $index < $this->size() 
     * @param integer $index
     * @return $value
     */
    public function get(int $index)
    {
        $currentItem = $this->head;
        for ($i=0; $i <= $index; $i++) { 
            try {
                $currentItem = $currentItem->getNext();
            } catch (\Throwable $th) {
                throw new OutOfBoundsException('Constructs ArrayList.get()');
            }
        }

        return 0;
    }

    /**
     * Get list elements
     *
     * @return array $array
     */
    public function toArray() : array
    {
        $array = [];
        $currentItem = $this->head;

        while ($currentItem->getNext() !== null) {
            $array[] = $currentItem->getValue();
            $currentItem = $currentItem->getNext();
        }

        return $array;
    }

}