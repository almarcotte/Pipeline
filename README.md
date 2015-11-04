# Pipeline

Pipeline allows to easily chain operations / tasks on the fly or create a reusable chain of commands. Complete [documentation](http://gnumast.github.io/Pipeline) is available.

## Installation

```
composer require gnumast/pipeline
```

## Basic usage

Here's a trivial example.

```php
class MakeAllCaps implements TaskInterface {
    public function run($data) {
        return mb_strtoupper($data);
    }
}

class RemoveAllSpaces implements TaskInterface {
    public function run($data) {
        return str_replace(' ', '', $data);
    }
}

$pipeline = new Pipeline(
    new MakeAllCaps(),
    new RemoveAllSpaces()
);
$pipeline->execute("Hello, my name is Steve"); // HELLO,MYNAMEISSTEVE
```

For simple chains where defining a brand new class isn't really worth it, or if you quickly want to chain things
together, the ``CallablePipe`` class wraps anonymous functions to be passed as pipes.

```php
$pipeline = new Pipeline(
    new CallablePipe(function($data) {
return $data * 10;
    }),
    new CallablePipe(function($data) {
return $data + 50;
    })
);

$result = $pipeline->execute(10); // 150
```

You don't have to pass all of your tasks at initialisation time. ``Pipeline`` provides an ``add`` method to add steps
 to an existing object:

```php
$pipeline = new Pipeline(new MakeAllCaps());
$pipeline->add(new RemoveAllSpaces());
$pipeline->execute("Hello, world!"); // HELLO,WORLD!
```
