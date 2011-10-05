<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChapterController extends Controller
{    
    public function viewAction($book, $chapter)
    {
        $chapter = $this->getDoctrine()
                        ->getRepository('TeachiMaterialBundle:Chapter')
                        ->findOneBy(array('number' => $chapter));
        
        if(!$chapter)
            throw $this->createNotFoundException('The chapter does not exist');
        
        return $this->render(
            'TeachiMaterialBundle:Chapter:view.html.twig',
            array(
                'chapter' => $chapter,
            )
        );
    }
}
