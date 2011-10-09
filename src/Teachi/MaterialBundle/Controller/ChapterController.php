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
        
        $contents = $this->getDoctrine()
                         ->getRepository('TeachiMaterialBundle:Content')
                         ->findBy(array('chapter' => $chapter->getId()), array('number' => 'asc'));
                         //->findBy(array('chapter' => $chapter->getId()));
        
        return $this->render(
            'TeachiMaterialBundle:Chapter:view.html.twig',
            array(
                'chapter'  => $chapter,
                'contents' => $contents
            )
        );
    }
}
