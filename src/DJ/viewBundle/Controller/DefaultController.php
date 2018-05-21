<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



class DefaultController extends Controller
{
    public function indexAction()
    {   
        //test
        $figure = $this->getDoctrine()->getRepository('DJviewBundle:Figures')->myfindall();
        
//        $test = $figure->getPicture();
        
        //$user = $this->getUser();
        //$test=  $user->getid();
        
        dump($figure);

        
        return $this->render('DJviewBundle:Advert:index.html.twig', array(
            'figure'=>$figure
        ));
    }
    
    public function detailfigureAction($id)
    {   
//        $id= 87;
        $em = $this->getDoctrine()->getManager();
        $figure = $em->find('DJviewBundle:Figures', $id);
        //dump($figure);
        if($figure){
            
            return $this->render('DJviewBundle:Advert:viewfigure.html.twig', array('figure'=>$figure));
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
            dump(gettype($users));

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
    
    
    
}
