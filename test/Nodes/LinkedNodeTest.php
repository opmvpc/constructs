<?php

namespace Opmvpc\Constructs\Test\Nodes;

use Opmvpc\Constructs\Nodes\LinkedNode;
use Opmvpc\Constructs\Test\BaseTestCase;

class LinkedNodeTest extends BaseTestCase {

    const TEST_VALUE = 1;

    private function createItem()
    {
        return new LinkedNode(self::TEST_VALUE);
    }

    public function testConstructItem()
    {
        $item = $this->createItem();

        $this->assertObjectHasAttribute('value', $item);
    }

    public function testItemValue()
    {
        $item = $this->createItem();

        $this->assertTrue($item->getValue() === self::TEST_VALUE);
    }
}
