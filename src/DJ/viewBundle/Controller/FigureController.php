<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;


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
    
    public function modificationfigureAction($id){
        
        $em = $this->getDoctrine()->getManager()->getRepository('DJviewBundle:Figures');
        
        $figure = $em->find($id);
        
        $id = 67;
        
        $em2 = $this->getDoctrine()->getManager()->getRepository('DJviewBundle:Pictures');
        $mpicture = $em2->find($id);
        
        
        
        
        
        
    return $this->render('DJviewBundle:Advert:modify_viewfigure.html.twig', array('figure'=>$figure));

    }
    
    public function testAction($id){
      
//        var_dump($_FILES);
//        die;
        $npicture = new UploadedFile($_FILES['myfile']['tmp_name'], $_FILES['myfile']['name']);
        
//        var_dump($_FILES);
        
//        die;
        
        
        $em = $this->getDoctrine()->getManager();
        $picture = $em->getRepository('DJviewBundle:Pictures')->find($id);
        
       
        
        $picture->setPictureLink($npicture);
        
        $result['sucess']=0;
        $result['image']= '';
        
        
        
            
        $picture = $em->getRepository('DJviewBundle:Pictures')->find($id);
        $namepicture = $picture->getPictureLink();
            
        $result['sucess']=1;
        $result['image']= $namepicture;
        
        
            
        
        
       
        
        
        
        
        return new JsonResponse($result);

    
}

}