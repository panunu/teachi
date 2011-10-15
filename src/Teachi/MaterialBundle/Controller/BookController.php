<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{    
    public function viewAction($book)
    {
        return $this->render('TeachiMaterialBundle:Book:view.html.twig', array(
            'book' => $this->getBookService()->getBookByLink($book),
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
