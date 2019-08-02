# Constructs

Constructs provides simple data structures with fluent api. All avalaible structures are fully tested (I think... 😁).

* Install
* Lists
    * ArrayList
    * LinkedList
* Stacks
    * ArrayStack
    * LinkedStack
* Queues
    * ArrayQueue
* Threes
    * ArrayHeap
*Helpers
    * toArray()
    * dump() & dumpAndDie()

## 🛠 Install

Just add this package to your composer project:

```bash
$ composer require opmvpc/constructs
```

Then import Constructs main class or individual classes in your code.

## Lists

### ArrayList

#### Available methods

```php
public static function make(): ListContract;
public function size(): int;
public function contains($item): bool;
public function add($item): ListContract;
public function remove($item): ListContract;
public function get(int $i);
public function toArray(): array;
```

#### Usage

```php
$list = Construct::arrayList()
    ->add(4)
    ->add(2)
    ->remove(4)
    ->add(6);
```

### LinkedList

#### Usage

```php
$list = Construct::linkedList()
    ->add(4)
    ->add(2)
    ->add(6);
```

### Complexity

| Method | ArrayList | LinkedList |
|---|---|---|
| get() | O(1) | O(n) |
| add() | O(1) | O(1) |
| remove() | O(n) | O(n) |

## Stacks

#### Available methods

```php
public static function make(): StackContract;
public function isEmpty(): bool;
public function push($item): StackContract;
public function pop(): StackContract;
public function top();
public function toArray(): array;
```

### ArrayStack

#### Usage

```php
$list = Construct::linkedStack()
    ->push(4)
    ->push(2)
    ->pop();
```

### LinkedStack

#### Usage

```php
$list = Construct::linkedStack()
    ->push(4)
    ->push(2)
    ->pop();
```

### Complexity

| Method | ArrayStack | LinkedStack |
|---|---|---|
| isEmpty() | O(1) | O(1) |
| push() | O(1) | O(1) |
| pop() | O(1) | O(1) |

## Queues

#### Available methods

```php
public static function make(): QueueContract;
public function isEmpty(): bool;
public function enqueue($item): QueueContract;
public function dequeue();
public function peek();
public function toArray(): array;
```

### ArrayQueue

#### Usage

```php
$list = Construct::linkedQueue()
    ->enqueue(4)
    ->enqueue(2)
    ->dequeue()
    ->enqueue(6);
```

### Complexity

| Method | ArrayQueue | LinkedQueue |
|---|---|---|
| isEmpty() | O(1) | O(1) |
| push() | O(1) | O(1) |
| pop() | O(1) | O(1) |

## Threes

#### Available methods

```php
public static function make(): ThreeContract;
public function size(): int;
public function add($item): ThreeContract;
public function remove($item): ThreeContract;
public function get(int $i): SimpleNode;
public function toArray(): array;
```

### ArrayHeap

#### Usage

```php
$list = Construct::arrayHeap()
    ->add(4)
    ->add(2)
    ->remove(2)
    ->add(6);
```

### Complexity

| Method | ArrayHeap | LinkedHeap |
|---|---|---|
| get() | O(1) | O(nlog(n)) |
| add() | O(nlog(n)) | O(nlog(n)) |
| remove() | O(nlog(n)) | O(nlog(n)) |

## Helpers

### toArray()

You can get an array representation of the current structure with the ```toArray()``` method.

```php
$array = Construct::linkedList()
    ->add(4)
    ->toArray();
```

### dump() 🚽 & dumpAndDie() ☠

Constructs uses the var_dumper Symfony component. You can use the ```dump()``` method on your structures.

```php
$list = Construct::linkedList()
    ->add(4)
    ->dump()
    ->remove(4)
    ->dump();
```

If you are more a "Dump and die" person, ```dumpAndDie()``` method is also available.

```php
$list = Construct::linkedList()
    ->add(4)
    ->add(2)
    ->dd()
    ->remove(4)
    ->add(6)
    ->dumpAndDie();
```
