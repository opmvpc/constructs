<?php

namespace Opmvpc\Constructs\Lists;

use Opmvpc\Constructs\Contracts\ListContract;
use Opmvpc\Constructs\Structure;
use OutOfBoundsException;

/**
 * Mutable Array based List implementation
 */
final class ArrayList extends Structure implements ListContract
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
    private function __construct()
    {
        $this->size = 0;
        $this->elements = [];
    }

    /**
     * Create a new Empty LinkedList
     *
     * @return ListContract
     */
    public static function make(): ListContract
    {
        return new ArrayList();
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
     *
     * @return void
     */
    public function add($item): ListContract
    {
        $this->elements[] = $item;
        $this->size += 1;

        return $this;
    }

    /**
     * Retire un item s'il est présent dans la liste,
     * sinon renvoie OutOfBoundException
     * size diminue de 1
     *
     * @param $item
     *
     * @throws OutOfBoundsException
     *
     * @return void
     */
    public function remove($item): ListContract
    {
        $key = \array_search($item, $this->elements);
        if ($key !== false) {
            unset($this->elements[$key]);
            $this->elements = array_values($this->elements);
            $this->size -= 1;
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
     * @return void
     */
    public function get(int $i)
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
     * @return array
     */
    public function toArray(): array
    {
        return $this->elements;
    }
}
