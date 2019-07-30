<?php

namespace Opmvpc\Constructs\Test\Lists;

use OutOfBoundsException;
use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Test\BaseTestCase;

class ArrayListTest extends BaseTestCase
{
    const TEST_ARRAY = [3, 6, 9, 3];

    private function createStructure()
    {
        return new ArrayList();
    }

    public function testConstruct()
    {
        $list = $this->createStructure();
        $this->assertObjectHasAttribute('size', $list);
        $this->assertObjectHasAttribute('elements', $list);
        $this->assertIsArray($list->toArray());
    }

    public function testSizeEmptyList()
    {
        $list = $this->createStructure();

        $this->assertEquals(count($list->toArray()), 0);
        $this->assertEquals($list->size(), 0);
    }

    public function testSizeFilledList()
    {
        $list = $this->createStructure();

        $list->add(3);

        $this->assertEquals(count($list->toArray()), $list->size());
        $this->assertEquals($list->size(), 1);
    }

    public function testAddItems()
    {
        $list = $this->createStructure();

        $list->add(3);
        $list->add(6);
        $list->add(9);
        $list->add(3);

        $this->assertEquals(count($list->toArray()), 4);
        $this->assertEquals($list->toArray(), self::TEST_ARRAY);
    }

    public function testListContainsItem()
    {
        $list = $this->createStructure();
        $list->add(3);

        $this->assertTrue($list->contains(3));
    }

    public function testListDoesntContainsItem()
    {
        $list = $this->createStructure();
        $list->add(2);

        $this->assertFalse($list->contains(3));
    }

    public function testListRemove()
    {
        $list = $this->createStructure();
        $list->add(2);
        $list->remove(2);

        $this->assertEquals(count($list->toArray()), 0);
    }

    public function testListRemoveFail()
    {
        $list = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $list->remove(2);
    }

    public function testGetItem()
    {
        $list = $this->createStructure();
        $list->add(2);

        $this->assertEquals($list->get(0), 2);
    }

    public function testGetItemFail()
    {
        $list = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $list->get(0);
    }

}
