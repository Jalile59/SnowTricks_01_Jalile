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
    
    public function addfiguresAction(Request $request){
        
        $figure = new \DJ\viewBundle\Entity\Figures();
        $nimage = new \DJ\viewBundle\Entity\Pictures;
        
        $form = $this->createForm(\DJ\viewBundle\Form\FiguresType::class, $figure);
        
        
        if($request->isMethod('POST')){
            
            $file=$figure->getPicture();
            
            dump($file);
            
            $figure->setFigureCreatedate(new \DateTime());
            
            $form->handleRequest($request);
            
            $file = $figure->getPicture();
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($figure);
//            die(var_dump($file));
            $em->flush();
        }
        
        
        return $this->render('DJviewBundle:Advert:addfigure.html.twig',
                array('form'=>$form->createView())
                );
    }
    
    
    
}
