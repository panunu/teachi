<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{    
    public function editAction()
    {
        
    }
    
    public function orderAction()
    {
        // TODO: Move into service.
        foreach($this->getRequest()->get('content_block') as $order => $id) {
            $content = $this->getDoctrine()->getRepository('TeachiMaterialBundle:Content')
                ->find($id);
                        
            $content->setNumber($order++);
            
            $this->getDoctrine()->getEntityManager()->flush();
        }
        
        // TODO: Return correct response (JSON).
        return new Response('ok');
    }
}
