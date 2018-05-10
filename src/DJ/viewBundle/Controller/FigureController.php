<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FigureController extends Controller {
    
    public function delfigureAction(Request $request, $id)
    {
        
        $em = $this->getDoctrine()->getRepository('DJviewBundle:Figures')->find($id);
        
        
        
        
    }
    
}