<?php

namespace Opmvpc\Constructs\Test\Queue;

use OutOfBoundsException;
use Opmvpc\Constructs\Queues\ArrayQueue;
use Opmvpc\Constructs\Test\BaseTestCase;

class ArrayQueueTest extends BaseTestCase
{
    const TEST_ARRAY = [3, 6, 9, 3];

    private function createStructure()
    {
        return ArrayQueue::make();;
    }

    public function testConstruct()
    {
        $queue = $this->createStructure();
        $this->assertObjectHasAttribute('size', $queue);
        $this->assertObjectHasAttribute('head', $queue);
        $this->assertObjectHasAttribute('last', $queue);
        $this->assertObjectHasAttribute('elements', $queue);
        $this->assertIsArray($queue->toArray());
    }

    public function testSizeEmptyqueue()
    {
        $queue = $this->createStructure();

        $this->assertEquals(0, count($queue->toArray()));
        $this->assertEquals(0, $queue->size());
    }

    public function testIsEmpty()
    {
        $queue = $this->createStructure();

        $this->assertEquals(true, $queue->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $queue = $this->createStructure()
            ->enqueue(3);

        $this->assertEquals(false, $queue->isEmpty());
    }

    public function testSizeFilledqueue()
    {
        $queue = $this->createStructure()
            ->enqueue(3);

        $this->assertEquals(count($queue->toArray()), $queue->size());
        $this->assertEquals(1, $queue->size());
    }

    public function testEnqueueItems()
    {
        $queue = $this->createStructure()
            ->enqueue(3)
            ->enqueue(6)
            ->enqueue(9)
            ->enqueue(3);

        $this->assertEquals(4, count($queue->toArray()));
        $this->assertEquals(self::TEST_ARRAY, $queue->toArray());
    }

    public function testqueuePeek()
    {
        $queue = $this->createStructure()
            ->enqueue(3);

        $this->assertEquals(3, $queue->peek());
    }

    public function testqueuePeekFilled()
    {
        $queue = $this->createStructure()
            ->enqueue(3)
            ->enqueue(5)
            ->enqueue(2);

        $this->assertEquals(2, $queue->peek());
    }

    public function testqueuePeekFail()
    {
        $queue = $this->createStructure();

        $this->expectException(OutOfBoundsException::class);
        $queue->peek();
    }

    public function testDequeue()
    {
        $queue = $this->createStructure();
        $queue
            ->enqueue(2)
            ->dequeue();

        $this->assertTrue($queue->isEmpty());
    }

    public function testDequeueFilled()
    {
        $queue = $this->createStructure();
        $queue
            ->enqueue(2)
            ->enqueue(3)
            ->dequeue();

        $this->assertEquals(3, $queue->peek());
    }

    public function testDequeueFail()
    {
        $queue = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $queue->dequeue();
    }

    public function testMixedOperations()
    {
        $queue = $this->createStructure();

        $queue
            ->enqueue(4)
            ->enqueue(2)
            ->dequeue();
        dump($queue);
        $queue
            ->enqueue(6)
            ->enqueue(3)
            ->dequeue();
        dump($queue);
        $queue
            ->enqueue(5)
            ->dequeue();
        dump($queue);
        dump($queue->peek());

        $this->assertEquals(3, $queue->peek());
    }

}
