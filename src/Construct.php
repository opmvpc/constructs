<?php

namespace Opmvpc\Constructs;

use Opmvpc\Constructs\Lists\ArrayList;
use Opmvpc\Constructs\Lists\LinkedList;
use Opmvpc\Constructs\Queues\ArrayQueue;
use Opmvpc\Constructs\Stacks\ArrayStack;
use Opmvpc\Constructs\Stacks\LinkedStack;
use Opmvpc\Constructs\Threes\Heaps\ArrayHeap;
use Opmvpc\Constructs\Threes\SearchThrees\LinkedSearchThree;
use Opmvpc\Constructs\Threes\SearchThrees\SearchThree;

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

    /**
     * Returns a new ArrayStack
     *
     * @return ArrayQueue
     */
    public static function arrayQueue()
    {
        return ArrayQueue::make();
    }

    /**
     * Returns a new ArrayHeap
     *
     * @return ArrayHeap
     */
    public static function arrayHeap()
    {
        return ArrayHeap::make();
    }

    /**
     * Returns a new SearchThree
     *
     * @return LinkedSearchThree
     */
    public static function searchThree()
    {
        return LinkedSearchThree::make();
    }
}
