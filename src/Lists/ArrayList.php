<?php

namespace Opmvpc\Constructs\Lists;

use Opmvpc\Constructs\Lists\AbstractList;
use OutOfBoundsException;

/**
 * Array based List implementation
 */
class ArrayList extends AbstractList
{
    /**
     * List size
     *
     * @var int
     */
    private $size;

    /**
     * Elements List
     *
     * @var array
     */
    private $elements;

    /**
     * Base constructor
     */
    public function __construct()
    {
        $this->size = 0;
        $this->elements = [];
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
        if (\array_search($item, $this->elements) !== false) {
            return true;
        }
        return false;     
    }

    /**
     * Ajoute un element dans la liste
     * size augmente de 1
     *
     * @param $item
     * @return void
     */
    public function add($item) : void
    {
        $this->elements[] = $item;
        $this->size += 1;
    }

    /**
     * Retire un item s'il est présent dans la liste,
     * sinon renvoie OutOfBoundException
     * size diminue de 1
     *
     * @param $item
     * @return void
     */
    public function remove($item) : void
    {
        $key = \array_search($item, $this->elements);
        if ($key !== false) {
            unset($this->elements[$key]);
            $this->size -= 1;
        } else {
            throw new OutOfBoundsException('Constructs ArrayList.remove()');
        }
    }

    /**
     * Get element positionned at elements[$i]
     *
     * @param integer $i
     * @return void
     */
    public function get(int $i)
    {
        try {
            return $this->elements[$i];
        } catch (\Throwable $th) {
            throw new OutOfBoundsException('Constructs ArrayList.get()');
        }
    }

    /**
     * Get list elements
     *
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }
}
