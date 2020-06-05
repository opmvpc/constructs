<?php

namespace Opmvpc\Constructs\Threes;

use BadMethodCallException;
use Opmvpc\Constructs\Contracts\SearchContract;
use Opmvpc\Constructs\Contracts\ThreeContract;
use Opmvpc\Constructs\Nodes\Leaf;
use Opmvpc\Constructs\Structure;

abstract class Three extends Structure implements ThreeContract, SearchContract
{
    protected $root;

    abstract public static function make(): ThreeContract;

    public function root(): ?Leaf
    {
        return $this->root;
    }

    public function insert($key, $value): ThreeContract
    {
        $newLeaf = Leaf::make($key, $value);

        if (is_null($this->root)) {
            $this->root = $newLeaf;

            return $this;
        }

        $current = $this->root;
        $parent = null;

        while (! is_null($current)) {
            $parent = $current;

            if ($current->compareTo($newLeaf) === 0) {
                return $this;
            }

            if ($current->compareTo($newLeaf) > 0) {
                $current = $current->left();
            } else {
                $current = $current->right();
            }
        }

        $newLeaf['parent'] = $parent;
        if ($parent->compareTo($newLeaf) > 0) {
            $parent['left'] = $newLeaf;
        } else {
            $parent['right'] = $newLeaf;
        }

        return $this;
    }

    public function remove($key): ThreeContract
    {
        throw new BadMethodCallException('Unsupported Operation');

        return $this;
    }

    public function toArray(): array
    {
        $array = [];

        if (is_null($this->root())) {
            return $array;
        }

        $this->addToArrayInOrder($this->root, $array, function () {
            return $this;
        });

        return $array;
    }

    public function keysArray(): array
    {
        $array = [];

        if (is_null($this->root())) {
            return $array;
        }

        $this->addToArrayInOrder($this->root, $array, function () {
            return $this->key();
        });

        return $array;
    }

    public function addToArrayInOrder(?Leaf $leaf, array &$array, callable $closure)
    {
        if (is_null($leaf)) {
            return $array;
        }

        if (! is_null($leaf)) {
            $this->addToArrayInOrder($leaf->left(), $array, $closure);
            $array[] = $closure->call($leaf);
            $this->addToArrayInOrder($leaf->right(), $array, $closure);
        }
    }

    public function min(?Leaf $leaf = null): Leaf
    {
        if (is_null($leaf)) {
            $leaf = $this->root;
        }

        while (! is_null($leaf->left())) {
            $leaf = $leaf->left();
        }

        return $leaf;
    }

    public function max(?Leaf $leaf = null): Leaf
    {
        if (is_null($leaf)) {
            $leaf = $this->root;
        }

        while (! is_null($leaf->right())) {
            $leaf = $leaf->right();
        }

        return $leaf;
    }

    public function successor(Leaf $leaf): ?Leaf
    {
        $newLeaf = Leaf::make(null);

        if (! is_null($leaf->right())) {
            return $this->min($leaf->right());
        }

        $newLeaf = $leaf->parent();
        while ($newLeaf !== null && $leaf->key() === $newLeaf->right()->key()) {
            $leaf = $newLeaf;
            $newLeaf = $newLeaf->parent();
        }

        return $newLeaf;
    }

    public function search($key, ?Leaf $leaf): ?Leaf
    {
        if ($leaf === null || $key === $leaf->key()) {
            return $leaf;
        }

        if ($key < $leaf->key()) {
            return $this->search($key, $leaf->left());
        } else {
            return $this->search($key, $leaf->right());
        }
    }

    /**
     * L'arbre doit avoir ses clés triées par ordre croissant
     * si on effectue un parcours infixe
     *
     * @return boolean
     */
    public function repOk(): bool
    {
        if (! $this->isSorted()) {
            return false;
        }

        if (! $this->isBinaryThree($this->root)) {
            return false;
        }

        return true;
    }

    public function isSorted(): bool
    {
        $array = $this->keysArray();
        $arrayToSort = $array;
        sort($arrayToSort);

        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] !== $arrayToSort[$i]) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check si le noeud courant
     * est plus grand que la feuille de gauche
     * est plus petit que la feuille de droite
     *
     * parcours infixe
     *
     * @return boolean
     */
    public function isBinaryThree(?Leaf $leaf, ?bool $isBinaryThree = true): bool
    {
        if (is_null($leaf)) {
            return $isBinaryThree;
        }

        if (! is_null($leaf)) {
            $this->isBinaryThree($leaf->left(), $isBinaryThree);
            if ($leaf->left() !== null && $leaf->key() < $leaf->left()->key()) {
                $isBinaryThree = false;
            }
            if ($leaf->right() !== null && $leaf->key() > $leaf->right()->key()) {
                $isBinaryThree = false;
            }
            $this->isBinaryThree($leaf->right(), $isBinaryThree);
        }

        return $isBinaryThree;
    }
}
