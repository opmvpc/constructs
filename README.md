# Constructs

Constructs provides simple data structures with fluent syntax.

* Install
* Lists
    * ArrayList
    * LinkedList
* Stacks
    * ArrayStack
    * LinkedStack
* Queues
    * ArrayQueue
    * LinkedQueue
* toArray()
* dump() & dd()

## Install

```bash
$ composer require opmvpc/constructs
```

## Lists

### ArrayList

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

## Stacks

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

## Queues

### ArrayQueue

#### Usage

```php
$list = Construct::linkedList()
    ->enqueue(4)
    ->enqueue(2)
    ->dequeue()
    ->enqueue(6);
```

### LinkedQueue

#### Usage

```php
$list = Construct::linkedList()
    ->enqueue(4)
    ->enqueue(2)
    ->dequeue()
    ->enqueue(6);
```

## toArray()

You can get an array representation of the current structure with the ```toArray()``` method.

```php
$array = Construct::linkedList()
    ->add(4)
    ->toArray();
```

## dump() & dd()

Constructs uses the var_dumper Symfony component. You can use the ```dump()``` method on your structures.

```php
$list = Construct::linkedList()
    ->add(4)
    ->dump()
    ->remove(4)
    ->dump();
```

If you are more a "Dump and die" person, ```dd()``` method is also available.

```php
$list = Construct::linkedList()
    ->add(4)
    ->add(2)
    ->dd()
    ->remove(4)
    ->add(6);
```
