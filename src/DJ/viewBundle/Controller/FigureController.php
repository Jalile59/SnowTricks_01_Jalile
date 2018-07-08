<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        
    return $this->render('DJviewBundle:Advert:modify_viewfigure.html.twig', array('figure'=>$figure,
                                                                                  'noimage'=>'noimge.jpg'
        ));

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
      
            
        $namepicture = $picture->getPictureLink();
            
        $result['sucess']=1;
        $result['image']= $namepicture;
        $result['id']=$id;

        return new JsonResponse($result);

    
    }

    function ajaxvideoAction($id){
        
        
        
        $result [] ='';
        
        if ($_POST['link']){
         
            
        $link = $_POST['link'];
        
        $em = $this->getDoctrine()->getManager();
        $videodata = $em->getRepository('DJviewBundle:Videos');
        $video = $videodata->find($id);
        
        $video->setVideolink($link);
        
        $em->flush();
        
        
        $result ['sucess']= 1;
        $result ['link'] = $link;
            
            
            
        }else{
            $result ['sucess'] ='erreur varible link vide';
            
        }

        
        $retourjson = new JsonResponse($result);
        
        
        
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
    
    function ajaxsuppAction($media,$id){
        
        if($media==='picture'){
        
        $em = $this->getDoctrine()->getManager();
        $getpicture = $em->getRepository('DJviewBundle:Pictures');
        
        $picture = $getpicture->find($id);
        
        $em->remove($picture);
        $em->flush();
        
        $result[] = '';
        $result['type'] = 'picture';
        $result['sucess'] = 1;
        
        return new JsonResponse($result);
        
        }elseif ($media === 'video') {
            
            $em = $this->getDoctrine()->getManager();
            $getvideo = $em->getRepository('DJviewBundle:Videos');
            $video = $getvideo->find($id);
            
            
            $em->remove($video);
            $em->flush();
            
        $result[] = '';
        $result['type'] = 'video';
        $result['sucess'] = 1;
        
        return new JsonResponse($result);

        }else{
            
        $result[] = '';
        $result['type'] = 'inconnu';
        $result['sucess'] = 0;
        
        return new JsonResponse($result);
        }
    }
}