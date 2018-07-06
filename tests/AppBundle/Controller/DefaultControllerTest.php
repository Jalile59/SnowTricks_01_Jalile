<?php
namespace Tests\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
class DefaultControllerTest extends WebTestCase
{
    private $client     = null;    
    private $login      = 'test_user_';
    private $email      = 'test_email_';
    private $password   = 'test_password';
    
    
    public function setUp()
    {
        $this->client = static::createClient();
        
        $this->login .= md5(uniqid()); 
        $this->email .= $this->login . '@test.com';
    }
    
    public function testLogin(){
        
        $client = $this->client;
        
        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->selectButton('Connexion')->form();
        
        $form['_username'] = 'doctrine';
        $form['_password'] = '123';
        
        $crawler = $client->submit($form);
        
        $crawler = $client->followRedirect();
        
        //echo $client->getResponse()->getContent();
        
        $this->client = $client;
        
        
       $this->assertContains('Bienvenue sur SnowTricks', $crawler->filter('h1')->getNode(0)->nodeValue);
        
    }
    
    
    public function testHomePage() {
        $crawler = $this->client->request('GET', '/');
        $this->assertContains('Bienvenue sur SnowTricks', $crawler->filter('h1')->getNode(0)->nodeValue);
    }
    
    
    public function testInscription() {
        
        $this->testLogin();
        
        $client     = static::createClient();        
        $crawler    = $client->request('GET', '/inscription');        
        $form       = $crawler->selectButton('Save')->form();        
        
        $form['dj_usersecuritybundle_user[username]']   = $this->login;
        $form['dj_usersecuritybundle_user[userphoto]']  = __DIR__ . '/../../../web/images/020637f43136c6f7a642ebbdaafff4f3.jpg';
        $form['dj_usersecuritybundle_user[password]']   = $this->password;
        $form['dj_usersecuritybundle_user[mail]']       = $this->email;
        
        $crawler    = $client->submit($form);  
        
        $this->client = $client;
        
        $this->assertEquals('DJ\viewBundle\Controller\DefaultController::inscriptionAction', $client->getRequest()->attributes->get('_controller'));
        
    }
    
    public function testaddfigure(){
        
        $client = $this->client;
        
        $crawler = $client->request('GET', '/login');
        
        $form = $crawler->selectButton('Connexion')->form();
        
        $form['_username'] = 'doctrine';
        $form['_password'] = '123';
        
        $crawler = $client->submit($form);
        
        
        //$client = $this->client;
        
       //        $crawler   = $client->request('GET', '/ajoutFigure/');
        $crawler = $client->request('GET', '/ajoutFigure/');
       
        $this->assertContains('Ajout Figure', $crawler->filter('h2')->getNode(0)->nodeValue);
        //$crawler = $client->followRedirect();
        
        echo $client->getResponse()->getContent();
        
    }
        
}