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
        return ArrayList::make();
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
        $list = $this->createStructure()
            ->add(3);

        $this->assertEquals(count($list->toArray()), $list->size());
        $this->assertEquals($list->size(), 1);
    }

    public function testAddItems()
    {
        $list = $this->createStructure()
            ->add(3)
            ->add(6)
            ->add(9)
            ->add(3);

        $this->assertEquals(count($list->toArray()), 4);
        $this->assertEquals($list->toArray(), self::TEST_ARRAY);
    }

    public function testArrayList()
    {
        $list = $this->createStructure();

        $list
            ->add("hello")
            ->add("world");

        $this->assertEquals($list->toArray(), ['hello', 'world']);
    }

    public function testListContainsItem()
    {
        $list = $this->createStructure()
            ->add(3);

        $this->assertTrue($list->contains(3));
    }

    public function testListDoesntContainsItem()
    {
        $list = $this->createStructure()
            ->add(2);

        $this->assertFalse($list->contains(3));
    }

    public function testListRemove()
    {
        $list = $this->createStructure()
            ->add(2)
            ->remove(2);

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
        $list = $this->createStructure()
            ->add(2);

        $this->assertEquals($list->get(0), 2);
    }

    public function testGetItemFail()
    {
        $list = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $list->get(0);
    }

    public function testMixedOperations()
    {
        $stack = $this->createStructure()
            ->add(4)
            ->add(2)
            ->remove(4)
            ->add(6)
            ->add(3)
            ->remove(3)
            ->add(5)
            ->remove(6);

        $this->assertEquals(5, $stack->get($stack->size() - 1));
    }

}
