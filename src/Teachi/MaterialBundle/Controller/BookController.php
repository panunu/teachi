<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{    
    public function viewAction($book)
    {
        $book = $this->getBookService()->getBookByLink($book);
        
        if(!$book)
            throw $this->createNotFoundException('The book does not exist');
        
        return $this->render('TeachiMaterialBundle:Book:view.html.twig', array(
            'book' => $book,
        ));
    }
    
    /**
     * @return BookService
     */
    protected function getBookService()
    {
        return $this->get('teachi_material.service.book');
    }
}