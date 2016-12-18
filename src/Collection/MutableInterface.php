<?php

namespace Halfpastfour\Collection\Collection;

/**
 * Interface MutableInterface
 */
interface MutableInterface extends ImmutableInterface
{
	/**
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function append( $value );

	/**
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function prepend( $value );

	/**
	 * Shift an element off of the left of the collection.
	 *
	 * @return mixed
	 */
	public function trimLeft();

	/**
	 * Pop an element off of the right of the collection.
	 *
	 * @return mixed
	 */
	public function trimRight();
}