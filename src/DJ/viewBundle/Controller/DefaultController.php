<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
      
        
        return $this->render('DJviewBundle:Advert:index.html.twig');
    }
    
    public function detailfigureAction()
    {
        
        return $this->render('DJviewBundle:Advert:viewfigure.html.twig');
    }
    
    public function inscriptionAction()
    {
        
        return $this->render('DJviewBundle:Advert:inscription.html.twig');
    }
    
    public function connectionAction(){
        
        return $this->render('DJviewBundle:Advert:connection.html.twig');
    }
    
    
    
}