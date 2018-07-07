<?php

namespace DJ\viewBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




class DefaultController extends Controller
{

    public function indexAction()
    {   

        
        $figure = $this->getDoctrine()->getRepository('DJviewBundle:Figures')->myfindall();
        
                
        return $this->render('DJviewBundle:Advert:index.html.twig', array(
            'figure'=>$figure,
            'noimage'=>'noimge.jpg'
            
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
            
            dump($comments);
            
            $commentsNpage = $this->getDoctrine()->getManager()->getRepository('DJviewBundle:Comments')->findBy(array('figureId'=>$id));
            //retourn le nombre de commentaire.
            $totalcomments = count($commentsNpage);
            $totalpage = intval($totalcomments/5);
            dump($totalpage);

            
            return $this->render('DJviewBundle:Advert:viewfigure.html.twig', array(
                'figure'=>$figure,
                'noimage'=>'noimge.jpg',
                'pagenext'=>$page+1,
                'pagebefore'=>$page-1,
                'page'=>$page,
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
            
            
            $message = \Swift_Message::newInstance()
            ->setSubject('Inscription SnowTricks')
            ->setFrom('SnowTrick@hotmail.com')
            ->setTo($users->getMail())
            ->setBody($this->renderview('DJviewBundle:Advert:confirmation_mail.html.twig',array('name'=>$users->getUsername())),'text/html');
        
            $this->get('mailer')->send($message);
            
            $em->persist($users);
            $em->flush();
            
            $this->addFlash('notice', 'Inscription confirmé');
            
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
  * @Security("has_role('ROLE_ADMIN')")
  * 
  */
    
    public function addfiguresAction(Request $request){
        
        $figure = new \DJ\viewBundle\Entity\Figures();
        
        $form = $this->createForm(\DJ\viewBundle\Form\FiguresType::class, $figure);
        $users = $this->getUser();
        
        
        if($request->isMethod('POST')and $form->handleRequest($request)->isValid()){
            
                                        
            $figure->setFigureCreatedate(new \DateTime());
            
            
            $figure->setUsers($users);
           
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($figure);
//            die(var_dump($file));
            $em->flush();
            
            $this->addFlash('notice', 'Save ok');
            
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
    
    public function fixturesdoctrineAction(){
        
        
         $nameTricks = [
            1 => 'mute',
            2 => 'sad',
            3 => 'indy',
            4 => 'stalefish',
            5 => 'tail grab',
            6 => 'nose grab',
            7 => 'japan air',
            8 => 'seat belt',
            9 => 'truck driver',
            10 => 'salom air'
        ];
        
        $sizeNameTricks = count($nameTricks);
        
        $figureDescription = "Une rotation peut être frontside ou backside : une rotation frontside correspond à une rotation orientée vers la carre backside. Cela peut paraître incohérent mais l'origine étant que dans un halfpipe ou une rampe de skateboard, une rotation frontside se déclenche naturellement depuis une position frontside (i.e. l'appui se fait sur la carre frontside), et vice-versa. Ainsi pour un rider qui a une position regular (pied gauche devant), une rotation frontside se fait dans le sens inverse des aiguilles d'une montre. Une rotation peut être agrémentée d'un grab, ce qui rend le saut plus esthétique mais aussi plus difficile car la position tweakée a tendance à déséquilibrer le rideur et désaxer la rotation. De plus, le sens de la rotation a tendance à favoriser un sens de grab plutôt qu'un autre. Les rotations de plus de trois tours existent mais sont plus rares, d'abord parce que les modules assez gros pour lancer un tel saut sont rares, et ensuite parce que la vitesse de rotation est tellement élevée qu'un grab devient difficile, ce qui rend le saut considérablement moins esthétique.";
        // create 20 products! Bam!
       
        $manager = $this->getDoctrine()->getManager();
        $manager2 = $this->getDoctrine()->getManager();
        
        for ($i = 1; $i < $sizeNameTricks; $i++) {
            
            $figure = new \DJ\viewBundle\Entity\Figures();
            
            $figure->setFigureName($nameTricks[$i]);
            $figure->setFigureDescription($figureDescription);
            $figure->setFigureCreatedate(new \DateTime());
            $figure->setUsers($this->getUser());
            $figure->setCategories('ski');
            
            $picture = new \DJ\viewBundle\Entity\Pictures();
            $picture->setFigure($figure);
            $picture->setPictureCreatedate(new \DateTime());
            $picture->setPictureLink($nameTricks[$i].".jpg");
            
            $manager->persist($figure);
            $manager2->persist($picture);
            
        }

        $manager->flush();
        $manager2->flush();
        
        return $this->redirectToRoute('d_jview_homepage');
    
    }
    
/**
  * 
  * 
  * 
  * @Security("has_role('ROLE_ADMIN')")
  * 
*/
    
    public function test_mailAction(){
        
            $message = \Swift_Message::newInstance()
            ->setSubject('Inscription SnowTricks')
            ->setFrom('SnowTrick@hotmail.com')
            ->setTo('jal.djellouli@gmail.com')
            ->setBody($this->renderview('DJviewBundle:Advert:testmail.html.twig',array('name'=> 'test')),"text/html");
        
            $sender = $this->get('mailer')->send($message);
                                               
            if($sender){
                
                $debug['senderBoolean'] =$sender;
                $debug['sucess'] = 1;
                return new \Symfony\Component\HttpFoundation\JsonResponse($debug);
            }else{
                $debug['sender'] = $debug;
                $debug['sucess'] = 0;
                return new \Symfony\Component\HttpFoundation\JsonResponse($debug);
            }
    }
    
    
    
}
