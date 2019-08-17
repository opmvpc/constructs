<?php

namespace Opmvpc\Constructs\Test\Threes;

use OutOfBoundsException;
use BadMethodCallException;
use Opmvpc\Constructs\Test\BaseTestCase;
use Opmvpc\Constructs\Threes\SearchThrees\LinkedSearchThree;

class LinkedSearchThreeTest extends BaseTestCase
{
    const TEST_ARRAY = [9, 3, 6, 3];

    private function createStructure()
    {
        return LinkedSearchThree::make();
    }

    public function testConstruct()
    {
        $three = $this->createStructure();
        $this->assertObjectHasAttribute('root', $three);
        $this->assertIsArray($three->toArray());
    }

    public function testSizeEmptyThree()
    {
        $three = $this->createStructure();
        $this->assertEquals(0, count($three->toArray()));
        $this->assertEquals(null, $three->root());
    }

    public function testSizeFilledThree()
    {
        $three = $this->createStructure()
            ->insert(3, 0);

        $this->assertEquals(1, count($three->toArray()));
    }

    public function testInsertItems()
    {
        $three = $this->createStructure()
            ->insert(3, "hello");
            $three->insert(6, "hello");
            $three->insert(4, "hello");
            $three->insert(1, "hello");
            $three->insert(12, "hello");
            $three->insert(9, "hello");
            $three->insert(3, "hello");

        $this->assertEquals(6, count($three->keysArray()));
        $this->assertEquals([1, 3, 4, 6, 9, 12], $three->keysArray());
    }

    public function testMin()
    {
        $three = $this->createStructure()
            ->insert(3, "hello")
            ->insert(6, "hello")
            ->insert(4, "hello")
            ->insert(1, "hello")
            ->insert(12, "hello")
            ->insert(9, "hello")
            ->insert(3, "hello");

        $this->assertEquals(1, $three->min()->key());
    }

    public function testMinWithParam()
    {
        $three = $this->createStructure()
            ->insert(3, "hello")
            ->insert(6, "hello")
            ->insert(4, "hello")
            ->insert(1, "hello")
            ->insert(12, "hello")
            ->insert(9, "hello")
            ->insert(3, "hello");

            $this->assertEquals(4, $three->min($three->root()->right())->key());
    }

    public function testMax()
    {
        $three = $this->createStructure()
            ->insert(3, "hello")
            ->insert(6, "hello")
            ->insert(4, "hello")
            ->insert(1, "hello")
            ->insert(12, "hello")
            ->insert(9, "hello")
            ->insert(3, "hello");

        $this->assertEquals(12, $three->max()->key());
    }

    public function testSuccessor()
    {
        $three = $this->createStructure()
            ->insert(9, "hello")
            ->insert(6, "hello")
            ->insert(12, "hello")
            ->insert(3, "hello")
            ->insert(8, "hello")
            ->insert(11, "hello")
            ->insert(15, "hello")
            ->insert(7, "hello")
            ->insert(4, "hello")
            ->insert(1, "hello");

        $this->assertEquals(6, $three->successor($three->root()->left()->left()->right())->key());
    }

    public function testSuccessorEzCase()
    {
        $three = $this->createStructure()
            ->insert(9, "hello")
            ->insert(6, "hello")
            ->insert(12, "hello")
            ->insert(3, "hello")
            ->insert(8, "hello")
            ->insert(11, "hello")
            ->insert(15, "hello")
            ->insert(7, "hello")
            ->insert(4, "hello")
            ->insert(1, "hello");

        $this->assertEquals(11, $three->successor($three->root())->key());
    }

    public function testLinkedSearchThree()
    {
        $three = $this->createStructure();

        $three
            ->insert(1, "hello")
            ->insert(2, "world");

        $leaf = $three
            ->search(2, $three->root());

        $this->assertEquals('world', $leaf->value());
    }

    // TODO remove()
    // public function testThreeRemove()
    // {
    //     $three = $this->createStructure()
    //         ->insert(2, 0)
    //         ->remove(2);

    //     $this->assertTrue($three->repOk());
    //     $this->assertEquals(0, count($three->toArray()));
    // }

    // public function testThreeRemoveFail()
    // {
    //     $three = $this->createStructure();
    //     $this->expectException(OutOfBoundsException::class);
    //     $three->remove(2);
    // }

    public function testThreeRemove()
    {
        $three = $this->createStructure()
            ->insert(2, 0);

        $this->expectException(BadMethodCallException::class);
        $three->remove(2);
    }


    public function testSearchItem()
    {
        $three = $this->createStructure()
            ->insert(2, 0);

        $this->assertTrue($three->repOk());
        $this->assertEquals(2, $three->search(2, $three->root())['key']);
    }

    public function testSearchItemFail()
    {
        $three = $this->createStructure();

        $this->assertNull($three->search(32, $three->root()));
    }

    public function testMixedOperations()
    {
        $three = $this->createStructure()
            ->insert(4, 0)
            ->insert(3, 0)
            ->insert(2, 0)
            ->insert(6, 0)
            ->insert(5, 0);

        $this->assertTrue($three->repOk());
    }

    public function testToArray()
    {
        $three = $this->createStructure()
            ->insert(5, 0)
            ->insert(5, 0)
            ->insert(5, 0)
            ->insert(5, 0)
            ->insert(6, 0)
            ->insert(7, 0)
            ->insert(9, 0)
            ->insert(5, 0);

        $this->assertTrue($three->repOk());
        $this->assertEquals(4, count($three->toArray()));
    }

    public function testRandomArrayRepIsOk()
    {
        $size = 100;
        $three = $this->createStructure();

        for ($i=0; $i < $size; $i++) {
            $randomNumber = rand(1, 1000);
            $three->insert($randomNumber, 0);
        }

        $this->assertTrue($three->repOk());
    }
}
