<?php

namespace Opmvpc\Constructs\Test\Lists;

use OutOfBoundsException;
use Opmvpc\Constructs\Test\BaseTestCase;
use Opmvpc\Constructs\Lists\LinkedList;

class LinkedListTest extends BaseTestCase
{
    const TEST_ARRAY = [3, 6, 9, 3];

    private function createList()
    {
        return new LinkedList();
    }

    public function testConstruct()
    {
        $list = $this->createList();
        $this->assertObjectHasAttribute('size', $list);
        $this->assertObjectHasAttribute('head', $list);
    }

    public function testSizeEmptyList()
    {
        $list = $this->createList();

        $this->assertEquals($list->size(), 0);
    }

    public function testSizeFilledList()
    {
        $list = $this->createList();

        $list->add(3);

        $this->assertEquals($list->size(), 1);
    }
    
    public function testAddItems()
    {
        $list = $this->createList();
    
        $list->add(3);
        $list->add(6);
        $list->add(9);
        $list->add(3);
    
        $this->assertEquals($list->size(), 4);
        $this->assertEquals($list->toArray(), self::TEST_ARRAY);
    }

    public function testListContainsItem()
    {
        $list = $this->createList();
        $list->add(3);

        $this->assertTrue($list->contains(3));
    }

    public function testListDoesntContainsItem()
    {
        $list = $this->createList();
        $list->add(2);

        $this->assertFalse($list->contains(3));
    }

    public function testListRemove()
    {
        $list = $this->createList();
        $list->add(2);
        
        $this->expectException(OutOfBoundsException::class);
        $list->remove(2);
    }

    public function testGetItem()
    {
        $list = $this->createList();
        $list->add(2);

        $this->assertEquals($list->get(0), 2);
    }

    public function testGetItemFail()
    {
        $list = $this->createList();
        $this->expectException(OutOfBoundsException::class);
        $list->get(0);
    }

}
