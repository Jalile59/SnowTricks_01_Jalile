<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DJ\usersecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{
    
    public function loginAction(Request $request){
        
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
          return $this->redirectToRoute('d_jview_homepage');
          
        }
            
        
        $authenticationUtils = $this->get('security.authentication_utils');
//        dump($authenticationUtils);
            
            
        
        return $this->render('DJviewBundle:Advert:connection.html.twig', array(
                'last_username'=> $authenticationUtils-> getLastUsername(),
                'error'         => $authenticationUtils->getLastAuthenticationError(),
            ));
    }
    
}
