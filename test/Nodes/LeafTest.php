<?php

namespace Opmvpc\Constructs\Test\Nodes;

use Opmvpc\Constructs\Nodes\Leaf;
use Opmvpc\Constructs\Test\BaseTestCase;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

/**
 * @group leaf
 */
class LeafTest extends BaseTestCase {
    use VarDumperTestTrait;

    const TEST_INT_KEY = 1;
    const TEST_STRING_KEY = 'hello';
    const TEST_VALUE = 0;

    private function createIntKey($key = null, Leaf $parent = null)
    {
        return Leaf::make(self::TEST_INT_KEY, self::TEST_VALUE, $parent);
    }

    private function createStringKey($key = null, Leaf $parent = null)
    {
        return Leaf::make(self::TEST_STRING_KEY, self::TEST_VALUE, $parent);
    }

    public function testConstructIntKey()
    {
        $item = $this->createIntKey();

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testConstructNullKey()
    {
        $item = $this->createIntKey(null);

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testConstructStringKey()
    {
        $item = $this->createStringKey();

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testOffsetExists()
    {
        $item = $this->createIntKey();
        $this->assertTrue($item->offsetExists('key'));

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testOffsetExistsFail()
    {
        $item = $this->createIntKey();
        $this->assertFalse($item->offsetExists('test'));

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testOffsetSet()
    {
        $item = $this->createIntKey();
        $item->offsetSet(null, 0);

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testOffsetUnsetFail()
    {
        $item = $this->createIntKey();
        $item->offsetUnset('key');

        $this->assertObjectHasAttribute('container', $item);
    }

    public function testInt()
    {
        $item = $this->createIntKey();

        $this->assertTrue($item->key() === self::TEST_INT_KEY);
    }

    public function testString()
    {
        $item = $this->createStringKey();

        $this->assertTrue($item->key() === self::TEST_STRING_KEY);
    }

    public function testValue()
    {
        $item = $this->createStringKey();

        $this->assertTrue($item->value() === self::TEST_VALUE);
    }

    public function testParent()
    {
        $item = $this->createStringKey();

        $this->assertTrue($item->parent() === null);
    }

    public function tesLeft()
    {
        $item = $this->createStringKey();

        $this->assertTrue($item->left() === null);
    }

    public function testRight()
    {
        $item = $this->createStringKey();

        $this->assertTrue($item->right() === null);
    }

    public function testDump()
    {
        $item = $this->createStringKey();

        $this->assertDumpEquals($item, $item);
    }
}
