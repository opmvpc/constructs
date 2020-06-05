<?php

namespace Opmvpc\Constructs\Tests;

use Opmvpc\Constructs\Construct;
use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Lists\LinkedList;
use Opmvpc\Constructs\Queues\ArrayQueue;
use Opmvpc\Constructs\Stacks\ArrayStack;
use Opmvpc\Constructs\Stacks\LinkedStack;
use Opmvpc\Constructs\Threes\Heaps\ArrayHeap;
use Opmvpc\Constructs\Threes\SearchThrees\LinkedSearchThree;

class ConstructTest extends BaseTestCase
{
    public function testArrayList()
    {
        $list = Construct::arrayList();
        $this->assertInstanceOf(ArrayList::class, $list);

        $list
            ->add("hello")
            ->add("world");

        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testLinkedList()
    {
        $list = Construct::linkedList();
        $this->assertInstanceOf(LinkedList::class, $list);

        $list
            ->add("hello")
            ->add("world");

        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testArrayStack()
    {
        $list = Construct::arrayStack();
        $this->assertInstanceOf(ArrayStack::class, $list);

        $list
            ->push("hello")
            ->push("world");

        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testLinkedStack()
    {
        $list = Construct::linkedStack();
        $this->assertInstanceOf(LinkedStack::class, $list);

        $list
            ->push("hello")
            ->push("world");

        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testArrayQueue()
    {
        $list = Construct::arrayQueue();
        $this->assertInstanceOf(ArrayQueue::class, $list);

        $list
            ->enqueue("hello")
            ->enqueue("world");

        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testArrayHeap()
    {
        $list = Construct::arrayHeap();
        $this->assertInstanceOf(ArrayHeap::class, $list);

        $list
            ->add("hello")
            ->add("world");

        $this->assertEquals($list->toArray(), ['world', 'hello']);
    }

    public function testSearchThree()
    {
        $list = Construct::searchThree();
        $this->assertInstanceOf(LinkedSearchThree::class, $list);

        $list
            ->insert("hello", 0)
            ->insert("world", 0);

        $this->assertEquals($list->toArray()[0]['key'], 'hello');
        $this->assertEquals($list->toArray()[1]['key'], 'world');
    }
}
