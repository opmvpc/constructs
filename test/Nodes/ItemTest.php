<?php

namespace Opmvpc\Structures\Test\Nodes;

use Opmvpc\Structures\Nodes\Item;
use Opmvpc\Structures\Test\BaseTestCase;

class ItemTest extends BaseTestCase {

    const TEST_VALUE = 1;

    private function createItem()
    {
        return new Item(self::TEST_VALUE);
    }

    public function testConstructItem()
    {
        $item = $this->createItem();

        $this->assertObjectHasAttribute('value', $item);
    }

    public function testItemValue()
    {
        $item = $this->createItem();

        $this->assertTrue($item->value === self::TEST_VALUE);
    }
}
