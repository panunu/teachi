<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{    
    public function viewAction($book)
    {
        if(!$book) {
            throw $this->createNotFoundException("The book '{$book}' does not exist");
        }
        
        return $this->render(
            'TeachiMaterialBundle:Book:view.html.twig',
            array(
                'book' => $book
            )
        );
    }
}
