<?php

namespace Opmvpc\Constructs\Test;

use Opmvpc\Constructs\Construct;
use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Lists\LinkedList;
use Opmvpc\Constructs\Stacks\ArrayStack;
use Opmvpc\Constructs\Test\BaseTestCase;
use Opmvpc\Constructs\Stacks\LinkedStack;

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
            ->push("world")
            ->push("hello");
        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }
}
