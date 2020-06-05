<?php

namespace Opmvpc\Constructs\Queues;

use Opmvpc\Constructs\Contracts\QueueContract;
use Opmvpc\Constructs\Structure;
use OutOfBoundsException;

/**
 * Mutable Array based Queue implementation
 */
final class ArrayQueue extends Structure implements QueueContract
{
    /**
     * List size
     *
     * @var int
     */
    private $size;

    /**
     * List head
     *
     * @var int
     */
    private $head;

    /**
     * List last
     *
     * @var int
     */
    private $last;

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
        $this->head = 0;
        $this->last = -1;
        $this->elements = [];
    }

    /**
     * Create a new Empty LinkedList
     *
     * @return QueueContract
     */
    public static function make(): QueueContract
    {
        return new ArrayQueue();
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
     * Return true if stack is empty,
     * else return false
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size === 0;
    }

    /**
     * Add an item at last position
     * $this->size + 1
     * $this->last + 1
     *
     * @param mixed $item
     *
     * @return QueueContract
     */
    public function enqueue($item): QueueContract
    {
        $this->size += 1;
        $this->last += 1;

        $this->elements[$this->last] = $item;

        return $this;
    }

    /**
     * Returns item at head position
     * $this->size - 1
     * $this->head - 1
     *
     * @throws OutOfBoundsException
     *
     * @return mixed $item
     */
    public function dequeue()
    {
        try {
            $item = $this->elements[$this->head];
        } catch (\Throwable $exception) {
            $message = 'Constructs ArrayQueue.dequeue() ';
            $message .= $exception->getMessage();

            throw new OutOfBoundsException($message);
        }

        $this->size -= 1;
        $this->head += 1;

        return $item;
    }

    /**
     * Returns item at last position
     *
     * @throws OutOfBoundsException
     *
     * @return mixed $item
     */
    public function peek()
    {
        try {
            return $this->elements[$this->last];
        } catch (\Throwable $exception) {
            $message = 'Constructs ArrayQueue.peek() ';
            $message .= $exception->getMessage();

            throw new OutOfBoundsException($message);
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

        for ($i = $this->head; $i <= $this->last; $i++) {
            $array[] = $this->elements[$i];
        }

        return $array;
    }
}
