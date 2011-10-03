<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{    
    public function viewAction($link)
    {
        $book = $this->getDoctrine()
                     ->getRepository('TeachiMaterialBundle:Book')
                     ->findOneBy(array('link' => $link));
        
        if(!$book)
            throw $this->createNotFoundException("The book '{$link}' does not exist");
        
        return $this->render(
            'TeachiMaterialBundle:Book:view.html.twig',
            array(
                'book' => $book
            )
        );
    }
}
