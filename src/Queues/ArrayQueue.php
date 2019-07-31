<?php

namespace Opmvpc\Constructs\Queues;

use OutOfBoundsException;
use Opmvpc\Constructs\Contracts\QueueContract;

final class ArrayQueue implements QueueContract
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

    private function __construct() {
        $this->size = 0;
        $this->head = -1;
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

    public function isEmpty(): bool
    {
        return $this->size === 0 ?? false;
    }

    public function enqueue($item): QueueContract
    {
        $this->size += 1;
        $this->last += 1;

        $this->elements[$this->last] = $item;

        return $this;
    }

    public function dequeue()
    {

        $this->size -= 1;
        $this->head += 1;

        try {
            $item = $this->elements[$this->head];
            unset($this->elements[$this->head]);
            $this->elements = array_values($this->elements);
        } catch (\Throwable $exception) {
            $message = 'Constructs ArrayQueue.dequeue() ';
            $message .= $exception->getMessage();
            throw new OutOfBoundsException($message);
            return;
        }

        return $item;
    }

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

    public function toArray(): array
    {
        return $this->elements;
    }

}
