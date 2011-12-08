<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{    
    public function updateAction()
    {
        $id      = $this->getRequest()->get('id');
        $content = $this->getRequest()->get('content');
        
        $this->getContentService()->update($id, $content);
        
        return new Response('ok'); // TODO: Return JSON response.
    }
    
    public function organizeAction()
    {
        $this->getContentService()->organize(
            $this->getRequest()->get('content_block')
        );
        
        return new Response('ok'); // TODO: Return JSON response.
    }
    
    /**
     * @return ContentService
     */
    protected function getContentService()
    {
        return $this->get('teachi_material.service.content');
    }
}
