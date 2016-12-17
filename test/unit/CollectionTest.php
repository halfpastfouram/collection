<?php

namespace Test;

use \Halfpastfour\Collection\ArraySerializableInterface;
use \Halfpastfour\Collection\Collection;
use \Halfpastfour\Collection\CollectionInterface;

/**
 * Class MyCollection
 * @package Test
 */
class MyCollection extends Collection
{
}

/**
 * Class CollectionTest
 * @package Test
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Array of data used for testing.
	 *
	 * @var array
	 */
	private $data = [ 'foo' => 'bar', 2, 3, 4, 5.0, 10 => true ];

	/**
	 * @var MyCollection
	 */
	private $collection;

	/**
	 * Create a new instance of a collection.
	 */
	public function setUp()
	{
		$this->collection = new MyCollection();
	}

	/**
	 * Test the correct implementation of classes and interfaces.
	 */
	public function testImplementation()
	{
		$this->assertInstanceOf( Collection::class, $this->collection );
		$this->assertInstanceOf( CollectionInterface::class, $this->collection );
		$this->assertInstanceOf( \IteratorAggregate::class, $this->collection );
		$this->assertInstanceOf( ArraySerializableInterface::class, $this->collection );
	}

	/**
	 *
	 */
	public function testArrayExchange()
	{
		$this->assertSame( [], $this->collection->exchangeArray( $this->data ) );
		$this->assertSame( $this->data, $this->collection->exchangeArray( [] ) );
		$this->assertSame( [], $this->collection->getArrayCopy() );
	}

	/**
	 * Test if a value can be appended.
	 */
	public function testAppend()
	{
		$this->collection->exchangeArray( $this->data );
		$data = $this->data;
		array_push( $data, 'Bar' );

		$this->assertInstanceOf( Collection::class, $this->collection->append( 'Bar' ) );
		$this->assertSame( $data, $this->collection->getArrayCopy() );
	}

	/**
	 * Test if a value can be prepended.
	 */
	public function testPrepend()
	{
		$this->collection->exchangeArray( $this->data );
		$data = $this->data;
		array_unshift( $data, 'Foo' );

		$this->assertInstanceOf( Collection::class, $this->collection->prepend( 'Foo' ) );
		$this->assertSame( $data, $this->collection->getArrayCopy() );
	}

	/**
	 * Test if trimming left and right values.
	 */
	public function testTrim()
	{
		$this->collection->exchangeArray( $this->data );

		// Trim left side
		$data      = $this->data;
		$leftValue = array_shift( $data );
		$this->assertSame( $leftValue, $this->collection->trimLeft() );
		$this->assertSame( $data, $this->collection->getArrayCopy() );

		// ... and again
		$leftValue = array_shift( $data );
		$this->assertSame( $leftValue, $this->collection->trimLeft() );
		$this->assertSame( $data, $this->collection->getArrayCopy() );

		// Trim right side
		$rightValue = array_pop( $data );
		$this->assertSame( $rightValue, $this->collection->trimRight() );
		$this->assertSame( $data, $this->collection->getArrayCopy() );

		// ... and again
		$rightValue = array_pop( $data );
		$this->assertSame( $rightValue, $this->collection->trimRight() );
		$this->assertSame( $data, $this->collection->getArrayCopy() );
	}

	/**
	 * Test if the class is traversable.
	 */
	public function testIterator()
	{
		$this->collection->exchangeArray( $this->data );

		$iterator = $this->collection->getIterator();
		$this->assertInstanceOf( \ArrayIterator::class, $iterator );

		$values = array_values( $this->data );
		$keys   = array_keys( $this->data );
		$index  = 0;
		foreach( $this->collection as $key => $value ) {
			$this->assertSame( $key, $keys[ $index ] );
			$this->assertSame( $value, $values[ $index ] );
			$index++;
		}
	}
}