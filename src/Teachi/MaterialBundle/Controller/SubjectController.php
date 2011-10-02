<?php

namespace Teachi\MaterialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SubjectController extends Controller
{
    public function indexAction()
    {
        return $this->render('TeachiMaterialBundle:Subject:index.html.twig');
    }
    
    public function viewAction()
    {
        return $this->render('TeachiMaterialBundle:Subject:view.html.twig');
    }
}
