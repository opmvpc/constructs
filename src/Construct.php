<?php

namespace Opmvpc\Constructs;

use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Lists\LinkedList;
use Opmvpc\Constructs\Stacks\ArrayStack;
use Opmvpc\Constructs\Stacks\LinkedStack;

/**
*  Construct simple data structures
*
*  @author Opmvpc
*/
final class Construct
{

    /**
     * Returns a new ArrayList
     *
     * @return ArrayList
     */
    public static function arrayList()
    {
        return ArrayList::make();
    }

    /**
     * Returns a new LinkedList
     *
     * @return LinkedList
     */
    public static function linkedList()
    {
        return LinkedList::make();
    }

    /**
     * Returns a new ArrayStack
     *
     * @return ArrayStack
     */
    public static function arrayStack()
    {
        return ArrayStack::make();
    }

    /**
     * Returns a new LinkedStack
     *
     * @return LinkedStack
     */
    public static function linkedStack()
    {
        return LinkedStack::make();
    }
}
