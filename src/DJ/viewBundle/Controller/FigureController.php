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
        
        dump($figure);
        
        
        
        
    return $this->render('DJviewBundle:Advert:modify_viewfigure.html.twig', array('figure'=>$figure));

    }
    
    public function ajaxuploadAction($id, $idarticle){
      
        $npicture = new UploadedFile($_FILES['myfile']['tmp_name'], $_FILES['myfile']['name']);
             
        $em = $this->getDoctrine()->getManager();
        $em_2 = $this->getDoctrine()->getManager();
        $picture = $em->getRepository('DJviewBundle:Pictures')->find($id);
        $figure = $em_2->getRepository('DJviewBundle:Figures')->find($idarticle);
        $figure->setFigureUpdatedate(new \DateTime());
        
       
        
        $picture->setPictureLink($npicture);
        
        $em->flush();
        
        $result['sucess']=0;
        $result['image']= '';
        $result['id']='';
        
        
        
            
        $picture = $em->getRepository('DJviewBundle:Pictures')->find($id);
        $namepicture = $picture->getPictureLink();
            
        $result['sucess']=1;
        $result['image']= $namepicture;
        $result['id']=$id;

        return new JsonResponse($result);

    
    }

    function ajaxvideoAction($id){
        
        $link = $_POST['link'];
        
//        var_dump($link);
        $em = $this->getDoctrine()->getManager();
        $videodata = $em->getRepository('DJviewBundle:Videos');
        $video = $videodata->find($id);
        
        $video->setVideolink($link);
        
        $em->flush();
        
        $result [] ='';
        $result ['sucess']= 1;
        $result ['link'] = $link;
        
        $retourjson = new JsonResponse($result);
        
//        var_dump($retourjson);
        
        
        return $retourjson;
    }
    
    
    function ajaxupdatedescriptionAction($id){
        
        $description = $_POST['description'];
        
        $em = $this->getDoctrine()->getManager();
        
        $figuredata = $em->getRepository('DJviewBundle:Figures');
        
        $figure = $figuredata->find($id);
        
        
        $figure->setFigureDescription($description);
        $figure->setFigureUpdatedate(new \DateTime());
        
        $em->flush();
        
        $result [] ='';
        $result ['sucess']= 1;
        $result ['id']= $id;
        $result ['description'] = $description;
        
        return new JsonResponse($result);
        
        
    }
}