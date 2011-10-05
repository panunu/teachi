<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{    
    public function viewAction($book)
    {
        $book = $this->getDoctrine()
                     ->getRepository('TeachiMaterialBundle:Book')
                     ->findOneBy(array('link' => $book));
        
        if(!$book)
            throw $this->createNotFoundException('The book does not exist');
        
        return $this->render(
            'TeachiMaterialBundle:Book:view.html.twig',
            array(
                'book' => $book,
            )
        );
    }
}
