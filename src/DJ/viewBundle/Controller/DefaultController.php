<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;




class DefaultController extends Controller
{

    public function indexAction()
    {   

        
        $figure = $this->getDoctrine()->getRepository('DJviewBundle:Figures')->myfindall();
        
        dump($figure);
                
        return $this->render('DJviewBundle:Advert:index.html.twig', array(
            'figure'=>$figure
        ));
    }
    
    public function detailfigureAction($id, Request $request, $page)
    {       
//        $id= 87;
        $em = $this->getDoctrine()->getManager();
        $figure = $em->find('DJviewBundle:Figures', $id);
        
        $comment = new \DJ\viewBundle\Entity\Comments();
        $form = $this->createForm(\DJ\viewBundle\Form\CommentsType::class,$comment);
        
        
        if($figure){
            
            if($request->isMethod('POST')){
                $user = $this->getUser();
                
                $comment->setUserId($user);
                $comment->setFigureId($figure);
                
                $form->handleRequest($request);
                $em2 = $this->getDoctrine()->getManager();
                $em2->persist($comment);
                $em2->flush();
                $em2->clear();
                
            }
            
            $comments = $this->getDoctrine()->getManager()->getRepository('DJviewBundle:Comments')->pagination($id,$page);
            
            
            $commentsNpage = $this->getDoctrine()->getManager()->getRepository('DJviewBundle:Comments')->findBy(array('figureId'=>$id));
            //retourn le nombre de commentaire.
            $totalcomments = count($commentsNpage);
            $totalpage = intval($totalcomments/5);
            dump(gettype($totalpage));

            
            return $this->render('DJviewBundle:Advert:viewfigure.html.twig', array(
                'figure'=>$figure,
                'comments'=>$comments,
                'totalpage'=>$totalpage,
                'form'=>$form->createView()
                ));
        }else{
            
            throw $this->createNotFoundException('Cette figure n\'existe pas !');
        }
        
        
    }
    
    public function inscriptionAction(Request $request)
    {
        $users = new \DJ\usersecurityBundle\Entity\User();
        
        $form = $this->createForm(\DJ\usersecurityBundle\Form\UserType::class,$users);
        
               
        if ($request->isMethod('POST')){
            
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();

            $em->persist($users);
            $em->flush();
            
            return $this->redirectToRoute('d_jview_homepage');

        }
        
       
        
        
        return $this->render('DJviewBundle:Advert:inscription.html.twig', array('form'=> $form->createView()));
    }
    
    public function connectionAction(){
        
        return $this->render('DJviewBundle:Advert:connection.html.twig');
    }
    
 /**
  * 
  * @param Request $request
  * @return type
  * @Security("has_role('ROLE_USER')")
  */
    
    public function addfiguresAction(Request $request){
        
        $figure = new \DJ\viewBundle\Entity\Figures();
        $nimage = new \DJ\viewBundle\Entity\Pictures;
        
        $form = $this->createForm(\DJ\viewBundle\Form\FiguresType::class, $figure);
        $users = $this->getUser();
        
        
        if($request->isMethod('POST')){
            
                                        
            $figure->setFigureCreatedate(new \DateTime());
            
            $form->handleRequest($request);
            $figure->setUsers($users);
           
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($figure);
//            die(var_dump($file));
            $em->flush();
            
             return $this->redirectToRoute('d_jview_homepage');
        }
        
        
        return $this->render('DJviewBundle:Advert:addfigure.html.twig',
                array('form'=>$form->createView())
                );
    }
    
  

    public function index2Action()
    {   

        
        $figure = $this->getDoctrine()->getRepository('DJviewBundle:Figures')->pagination(1,5);
        
        dump($figure);
                
        return $this->render('DJviewBundle:Advert:index.html.twig', array(
            'figure'=>$figure
        ));
    }
    
    
    
}
