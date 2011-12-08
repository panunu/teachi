<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChapterController extends Controller
{    
    public function viewAction($book, $chapter)
    {
        $chapter = $this->getChapterService()
            ->getChapterWithContentsByNumberAndBookLink($chapter, $book);
                
        if(!$chapter)
            throw $this->createNotFoundException('The chapter does not exist');
        
        return $this->render('TeachiMaterialBundle:Chapter:view.html.twig', array(
            'chapter'  => $chapter
        ));
    }
    
    /**
     * @return ChapterService
     */
    protected function getChapterService()
    {
        return $this->get('teachi_material.service.chapter');
    }
}
