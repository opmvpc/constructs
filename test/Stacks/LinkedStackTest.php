<?php

namespace Opmvpc\Constructs\Test\Stacks;

use OutOfBoundsException;
use Opmvpc\Constructs\Stacks\LinkedStack;
use Opmvpc\Constructs\Test\BaseTestCase;

class LinkedStackTest extends BaseTestCase
{
    const TEST_ARRAY = [3, 6, 9, 3];

    private function createStructure()
    {
        return LinkedStack::make();
    }

    public function testConstruct()
    {
        $stack = $this->createStructure();
        $this->assertObjectHasAttribute('head', $stack);
    }

    public function testSizeEmptyStack()
    {
        $stack = $this->createStructure();

        $this->assertEquals(0, count($stack->toArray()));
    }

    public function testIsEmpty()
    {
        $stack = $this->createStructure();

        $this->assertEquals(true, $stack->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $stack = $this->createStructure()
            ->push(3);

        $this->assertEquals(false, $stack->isEmpty());
    }

    public function testSizeFilledStack()
    {
        $stack = $this->createStructure()
            ->push(3);

        $this->assertEquals(1, count($stack->toArray()));
    }

    public function testPushItems()
    {
        $stack = $this->createStructure()
            ->push(3)
            ->push(9)
            ->push(6)
            ->push(3);

        $this->assertEquals(4, count($stack->toArray()));
        $this->assertEquals(self::TEST_ARRAY, $stack->toArray());
    }

    public function testStackTop()
    {
        $stack = $this->createStructure()
            ->push(3);

        $this->assertEquals(3, $stack->top());
    }

    public function testStackTopFilled()
    {
        $stack = $this->createStructure()
            ->push(3)
            ->push(5)
            ->push(2);

        $this->assertEquals(2, $stack->top());
    }

    public function testStackTopFail()
    {
        $stack = $this->createStructure();

        $this->expectException(OutOfBoundsException::class);
        $stack->top();
    }

    public function testPop()
    {
        $stack = $this->createStructure()
            ->push(2)
            ->pop();

        $this->assertTrue($stack->isEmpty());
    }

    public function testPopFilled()
    {
        $stack = $this->createStructure()
            ->push(2)
            ->push(3)
            ->pop();

        $this->assertEquals(2, $stack->top());
    }

    public function testPopFail()
    {
        $stack = $this->createStructure();
        $this->expectException(OutOfBoundsException::class);
        $stack->pop();
    }

    public function testMixedOperations()
    {
        $stack = $this->createStructure()
            ->push(4)
            ->push(2)
            ->pop()
            ->push(6)
            ->push(3)
            ->pop()
            ->push(5)
            ->pop();

        $this->assertEquals(6, $stack->top());
    }

}
