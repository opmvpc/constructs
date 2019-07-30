<?php

namespace Opmvpc\Constructs;

use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Lists\LinkedList;

/**
*  Construct simple data structures
*
*  @author Opmvpc
*/
class Construct
{

    public static function arrayList()
    {
        return ArrayList::make();
    }

    public static function linkedList()
    {
        return LinkedList::make();
    }
}
