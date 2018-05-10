<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FigureController extends Controller {
    
    public function delfigureAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        
        $figure = $em->find('DJviewBundle:Figures', $id);
        
        
        if ($figure){
                                
            $em->remove($figure);
            
            $em->flush();
                       
        }else{
            
            throw $this->createNotFoundException('Cette figure n\'existe pas');
        }
                
       return $this->redirectToRoute('d_jview_homepage');
        
        
    }
    
}