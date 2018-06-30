<?php
namespace Tests\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


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
    
    
    public function testHomePage() {
        $crawler = $this->client->request('GET', '/');
        $this->assertContains('Bienvenue sur SnowTricks', $crawler->filter('h1')->getNode(0)->nodeValue);
    }
    
    
    public function testInscription() {
                
        $client     = static::createClient();        
        $crawler    = $client->request('GET', '/inscription');        
        $form       = $crawler->selectButton('Save')->form();        
        
        $form['dj_usersecuritybundle_user[username]']   = $this->login;
        $form['dj_usersecuritybundle_user[userphoto]']  = __DIR__ . '/../../../web/images/020637f43136c6f7a642ebbdaafff4f3.jpg';
        $form['dj_usersecuritybundle_user[password]']   = $this->password;
        $form['dj_usersecuritybundle_user[mail]']       = $this->email;
        
        $crawler    = $client->submit($form);        
        
        $this->assertEquals('DJ\viewBundle\Controller\DefaultController::inscriptionAction', $client->getRequest()->attributes->get('_controller'));
        
    }
    
    /*
    
    public function testAddFigure() {
                
    }
    
    public function testDetailFigure() {
        
    }
        
    
    public function testDeleteFigure() {
        
    }
    */
        
}
