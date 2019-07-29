<?php

namespace Opmvpc\Structures\Test;

use Opmvpc\Structures\Structures;
use Opmvpc\Structures\Test\BaseTestCase;

class StructuresTest extends BaseTestCase
{
    public function testPrint()
    {
        $this->assertTrue((new Structures)->method1(22) === 'Hello World');
    }
}
