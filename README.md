[![Build Status](https://travis-ci.org/halfpastfouram/collection.svg?branch=master)](https://travis-ci.org/halfpastfouram/collection)
[![Code Climate](https://codeclimate.com/github/halfpastfouram/collection/badges/gpa.svg)](https://codeclimate.com/github/halfpastfouram/collection)
[![Test Coverage](https://codeclimate.com/github/halfpastfouram/collection/badges/coverage.svg)](https://codeclimate.com/github/halfpastfouram/collection/coverage)
[![Downloads](https://img.shields.io/packagist/dt/halfpastfouram/collection.svg)](https://packagist.org/packages/halfpastfouram/collection)
[![Latest Stable Version](https://img.shields.io/packagist/v/halfpastfouram/collection.svg)](https://packagist.org/packages/halfpastfouram/collection)

# Mutable
A flexible PHP Mutable complete with custom Iterator, part of the `halfpastfouram` code library.

## What can you do with a collection?
A collection is a tool you can use to have a certain level of control over the data you store inside it. Where you could use an array in most situations a collection provides a more flexible way to deal with your data.

It is particularly useful to extend this class if you need to perform actions on a list of items or objects when they are added, removed, replaced or otherwise modified.

## Control over collections
You can traverse all collection types. To give you more flexibility, use the `ArrayAccess` class which provides direct array access as if you were talking to an array. This class also provides an iterator that can be used in loops or even manually.

### Array access example

````php
$collection = new Collection\ArrayAccess( [ 0, 1, 2, 3 ] );
$collection[] = 0;
$collection[5] = 12;
````

### Traversing

````php
foreach( $collection as $key => $value ) {
    var_dump( $key, $value );
}
````

### Manual traversing (ArrayAccess only)

````php
$iterator   = $collection->getIterator();

// Jump forward to next position
$iterator->next();
var_dump( $iterator->current() );

// Go back one position
$iterator->previous();
var_dump( $iterator->getKey(), $iterator->current() );

// Receive the list of keys in the dataset.
var_dump( $iterator->calculateKeyMap() );
````

## Installation

### Using composer
    $ composer require halfpastfouram/collection

### Development
This project uses composer, which should be installed on your system. Most
Linux systems have composer available in their PHP packages.
Alternatively you can download composer from [getcomposer.org](http://getcomposer.org).

If you use the PhpStorm IDE then you can simply init composer through the IDE. However,
full use requires the commandline. See PhpStorm help, search for composer.

To start development, do `composer install` from the project directory. 

**Remark** Do not use `composer update` unless you changed the dependency requirements in composer.json.
The difference is that `composer install` will use composer.lock read-only, 
while `composer update` will update your composer.lock file regardless of any change.
As the composer.lock file is committed to the repo, other developers might conclude 
dependencies have changed, while they have not.
