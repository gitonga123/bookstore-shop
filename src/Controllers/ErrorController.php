<?php

namespace Bookstore\Controllers;

/**
 * Errors controller
 * extends the abstract controller
 * renders the error.twig template
 * 
 */
class ErrorController extends AbstractController
{
	
	public function notFound(): string
	{
		$properties = ['errorMessage' => 'Page not Found!'];
		return $this->render('error.twig', $properties);
	}
}
?>