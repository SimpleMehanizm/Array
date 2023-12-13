# Introduction

This project exposes two functions (for now) to aid with dot-notation for accessing array values

## Examples

Accessing multidimensional array values in PHP can be troublesome and many popular languages expose the so-called "dot-notation" to specify which array key/dimension to access.

```php

$array = [
    'this' => [
        'is' => [
            'deeply' => ['nested' => 'hello world']        
        ]    
    ]
];

$value = $array['this']['is']['deeply']['nested']; // "hello world"

```

In the above example, we might try to access a nonexistent array key, thus triggering a warning. Using dot-notation and function `arrayValue`, we can try to access the value and avoid triggering the error.

```php 

use function SimpleMehanizm\Array\Functions\readValue;

$array = [
    'this' => [
        'is' => [
            'deeply' => ['nested' => 'hello world']        
        ]    
    ]
];

$path = 'this.is.deeply.nested';

$value = readValue($array, $path); // "hello world"

```

## Why would you use the dot-notation

In cases such as saving value to database or other persistence layer which describes where a particular value might be within a config array, it's useful to save dot-notation to the value and then utilze `readValue` function to access it.




