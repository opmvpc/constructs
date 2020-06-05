<?php

namespace Opmvpc\Constructs\Tests;

use Opmvpc\Constructs\Construct;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

class StructureTest extends BaseTestCase
{
    use VarDumperTestTrait;

    public function testDump()
    {
        $list = Construct::arrayList()
            ->add(3)
            ->add(4);

        $this->assertDumpEquals($list, $list);
    }
}
