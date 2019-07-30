<?php

namespace Opmvpc\Constructs\Test\Stacks;

use OutOfBoundsException;
use Opmvpc\Constructs\Stacks\ArrayStack;
use Opmvpc\Constructs\Test\BaseTestCase;

class ArrayStackTest extends BaseTestCase
{
    const TEST_ARRAY = [3, 6, 9, 3];

    private function createStructure()
    {
        return new ArrayStack();
    }

    public function testConstruct()
    {
        $stack = $this->createStructure();
        $this->assertObjectHasAttribute('size', $stack);
        $this->assertObjectHasAttribute('elements', $stack);
        $this->assertIsArray($stack->toArray());
    }

    public function testSizeEmptyStack()
    {
        $stack = $this->createStructure();

        $this->assertEquals(count($stack->toArray()), 0);
        $this->assertEquals($stack->size(), 0);
    }

    public function testIsEmpty()
    {
        $stack = $this->createStructure();

        $this->assertEquals($stack->isEmpty(), true);
    }

    public function testIsNotEmpty()
    {
        $stack = $this->createStructure();

        $stack->push(3);

        $this->assertEquals($stack->isEmpty(), false);
    }

    public function testSizeFilledStack()
    {
        $stack = $this->createStructure();

        $stack->push(3);

        $this->assertEquals(count($stack->toArray()), $stack->size());
        $this->assertEquals($stack->size(), 1);
    }

    public function testPushItems()
    {
        $stack = $this->createStructure();

        $stack->push(3);
        $stack->push(6);
        $stack->push(9);
        $stack->push(3);

        $this->assertEquals(count($stack->toArray()), 4);
        $this->assertEquals($stack->toArray(), self::TEST_ARRAY);
    }

    public function testStackTop()
    {
        $stack = $this->createStructure();
        $stack->push(3);

        $this->assertEquals($stack->top(), 3);
    }

    public function testStackTopFail()
    {
        $stack = $this->createStructure();

        $this->expectException(OutOfBoundsException::class);
        $stack->top();
    }

    public function testPop()
    {
        $stack = $this->createStructure();
        $stack->add(2);
        $stack->remove(2);

        $this->assertEquals(count($stack->toArray()), 0);
    }

    public function testPopFail()
    {
        $stack = $this->createStructure();
        $stack->add(2);
        $stack->remove(2);

        $this->assertEquals(count($stack->toArray()), 0);
    }

}
