<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 24/09/18
 * Time: 17:41
 */

namespace Bookstore\Tests\Domain\Controllers;

use Bookstore\Controllers\BookController;
use Bookstore\Core\Request;
use Bookstore\Exceptions\NotFoundExceptions;
use Bookstore\Models\BookModel;
use Bookstore\Tests\ControllerTestCase;
use Twig_Template;

class BookControllerTest extends ControllerTestCase
{
    private function getController( Request $request = null): BookController
    {
        if ($request === null) {
            $request = $this->mock('Core\Request');
        }
        return new BookController($this->di, $request);
    }

    public function testBookNotFound()
    {
        $bookModel1 = $this->mock(BookModel::class);
        $bookModel1->expects($this->once())->method('get')
            ->with(123)->will(
                $this->throwException(new NotFoundExceptions())
            );
        $this->di->set('BookModel', $bookModel1);

        $response = "Rendered Template";
        $template = $this->mock(Twig_Template::class);
        $template->expects($this->once())->method('render')
            ->with(['errorMessage' => 'Book Not Found'])->will($this->returnValue($response));
        $this->di->get('Twig_Environment')->expects($this->once())
            ->method('loadTemplate')->with('error.twig')->will($this->returnValue($template));
        $result = $this->getController()->borrow(123);

        $this->assertSame($result, $response, "Reponse object is not the expected one.");
    }
    

}