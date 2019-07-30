<?php

namespace Opmvpc\Constructs\Test;

use Opmvpc\Constructs\Construct;
use Opmvpc\Constructs\Test\BaseTestCase;
use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Lists\LinkedList;

class ConstructTest extends BaseTestCase
{

    public function testArrayList()
    {
        $list = Construct::arrayList();
        $this->assertInstanceOf(ArrayList::class, $list);

        $list->add("hello");
        $list->add("world");
        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testLinkedList()
    {
        $list = Construct::linkedList();
        $this->assertInstanceOf(LinkedList::class, $list);

        $list->add("hello");
        $list->add("world");
        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }
}
