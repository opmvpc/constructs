<?php

namespace Opmvpc\Constructs\Test;

use Opmvpc\Constructs\Construct;
use Opmvpc\Constructs\Test\BaseTestCase;
use Opmvpc\Constructs\Lists\ArrayList;

class ConstructTest extends BaseTestCase
{
    public function testPrint()
    {
        $this->assertTrue((new Construct)->method1(22) === 'Hello World');
    }

    public function testArrayList()
    {
        $arrayList = Construct::arrayList();
        $this->assertInstanceOf(ArrayList::class, $arrayList);
        
        $arrayList->add("hello");
        $this->assertEquals($arrayList->toArray(), ["hello"]);
    }
}
