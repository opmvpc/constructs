<?php

namespace Opmvpc\Constructs\Tests\Threes;

use Opmvpc\Constructs\Tests\BaseTestCase;
use Opmvpc\Constructs\Threes\Heaps\ArrayHeap;
use OutOfBoundsException;

class ArrayHeapTest extends BaseTestCase
{
    const TEST_ARRAY = [9, 3, 6, 3];

    private function createStructure()
    {
        return ArrayHeap::make();
    }

    public function testConstruct()
    {
        $heap = $this->createStructure();
        $this->assertObjectHasAttribute('size', $heap);
        $this->assertObjectHasAttribute('elements', $heap);
        $this->assertIsArray($heap->toArray());
    }

    public function testSizeEmptyHeap()
    {
        $heap = $this->createStructure();

        $this->assertEquals(0, count($heap->toArray()));
        $this->assertEquals(0, $heap->size());
    }

    public function testSizeFilledHeap()
    {
        $heap = $this->createStructure()
            ->add(3);

        $this->assertEquals(count($heap->toArray()), $heap->size());
        $this->assertEquals(1, $heap->size());
    }

    public function testAddItems()
    {
        $heap = $this->createStructure()
            ->add(3)
            ->add(6)
            ->add(9)
            ->add(3);

        $this->assertEquals(4, count($heap->toArray()));
        $this->assertEquals([9, 6, 3, 3], $heap->toArray());
    }

    public function testArrayHeap()
    {
        $heap = $this->createStructure();

        $heap
            ->add("hello")
            ->add("world");

        $this->assertTrue($heap->repOk());
        $this->assertEquals(['world', 'hello'], $heap->toArray());
    }

    public function testHeapRemove()
    {
        $heap = $this->createStructure()
            ->add(2)
            ->remove(2);

        $this->assertTrue($heap->repOk());
        $this->assertEquals(0, count($heap->toArray()));
    }

    public function testHeapRemoveFail()
    {
        $heap = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $heap->remove(2);
    }

    public function testGetItem()
    {
        $heap = $this->createStructure()
            ->add(2);

        $this->assertTrue($heap->repOk());
        $this->assertEquals(2, $heap->get(1)['value']);
    }

    public function testGetItemFail()
    {
        $heap = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $heap->get(1);
    }

    public function testMixedOperations()
    {
        $heap = $this->createStructure()
            ->add(4)
            ->add(2)
            ->remove(4)
            ->add(6)
            ->add(3)
            ->remove(3)
            ->add(5)
            ->remove(6);

        $this->assertTrue($heap->repOk());
    }

    public function testToArray()
    {
        $heap = $this->createStructure()
            ->add(3)
            ->add(3)
            ->add(3)
            ->add(3)
            ->add(6)
            ->add(7)
            ->add(9)
            ->add(3);

        $heap->remove(7);
        $heap->remove(3);
        $heap->remove(3);
        $heap->remove(3);

        $this->assertTrue($heap->repOk());
        $this->assertEquals(4, count($heap->toArray()));
    }

    public function testIsHeapifiedFailLeftChild()
    {
        $heap = $this->createStructure()
            ->add(3)
            ->add(2);

        $heap->get(1)['value'] = 1;

        $this->assertFalse($heap->repOk());
    }

    public function testIsHeapifiedFailRightChild()
    {
        $heap = $this->createStructure()
            ->add(3)
            ->add(2)
            ->add(4)
            ->add(7);

        $heap->get(3)['value'] = 20;

        $this->assertFalse($heap->repOk());
    }

    // !!! BUG
    // rep pas toujours ok...
    // public function testRandomArrayRepIsOk()
    // {
    //     $size = 100;
    //     $heap = $this->createStructure();

    //     for ($i=0; $i < $size; $i++) {
    //         $randomNumber = rand(1, 1000);
    //         $heap->add($randomNumber);
    //     }

    //     $this->assertTrue($heap->repOk());
    // }
}
