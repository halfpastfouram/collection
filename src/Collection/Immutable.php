<?php

namespace Halfpastfour\Collection\Collection;

use Halfpastfour\Collection\ArraySerializableInterface;

/**
 * Class Immutable
 * @package Halfpastfour\Collection\Collection
 */
class Immutable implements ImmutableInterface, \IteratorAggregate, ArraySerializableInterface
{
	/**
	 * The internal set of data.
	 *
	 * @var array
	 */
	protected $data = [];

	/**
	 * Mutable constructor.
	 *
	 * @param array|null $data
	 */
	public function __construct( array $data = null )
	{
		if( !is_null( $data ) ) {
			$this->data = $data;
		}
	}

	/**
	 * Should return an array containing all values.
	 *
	 * @return array
	 */
	public function getArrayCopy()
	{
		return $this->data;
	}

	/**
	 * Get (and create if not exists) an iterator.
	 *
	 * @return \ArrayIterator
	 */
	public function getIterator()
	{
		return new \ArrayIterator( $this->data );
	}
}