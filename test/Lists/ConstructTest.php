<?php

namespace Opmvpc\Constructs\Test;

use Opmvpc\Constructs\Construct;
use Opmvpc\Constructs\Test\BaseTestCase;

class ConstructTest extends BaseTestCase
{
    public function testPrint()
    {
        $this->assertTrue((new Construct)->method1(22) === 'Hello World');
    }
}
