<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{    
    public function editAction()
    {
        
    }
    
    public function organizeAction()
    {
        $this->getContentService()->organize(
            $this->getRequest()->get('content_block')
        );
        
        // TODO: Return correct response (JSON).
        return new Response('ok');
    }
    
    /**
     * @return ContentService
     */
    protected function getContentService()
    {
        return $this->get('teachi_material.service.content');
    }
}
