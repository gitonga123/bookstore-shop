<?php

namespace Bookstore\Domain;

/**
 * TAXES
 */

class Tax
{
	
	public static function add(array &$book, $index, $percentage)
	{
		if (isset($book['price'])) {
			$book['price'] += round($percentage * $book['price'], 2);
		}
	}

	public function addTaxes(array &$book, $index, $percentage)
	{
		if (isset($book['price'])) {
			$book['price'] += round($percentage * $book['price'], 2);
		}
	}
}