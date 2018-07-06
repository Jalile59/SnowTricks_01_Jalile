<?php

namespace DJ\usersecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;


/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="DJ\usersecurityBundle\Repository\UserRepository")
 */
 class User implements UserInterface
{
     /**
      *@ORM\Column(name="userphoto", type="string", length=255)
      * @var type 
      */
     private $userphoto;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     *@ORM\OneToMany(targetEntity="DJ\viewBundle\Entity\Comments",  cascade={"persist", "remove"}, mappedBy="userId")
     * @var type 
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="userCreateDate", type="datetime")
     */
    private $userCreateDate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    private $roles=array();
    
    public function __construct() {
        
        //$this->sendmail();

        $this->userCreateDate = new \DateTime();
        $this->roles [] = 'ROLE_ADMIN';
        $this->salt= '';
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $bcrypt = new \Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder(12);
        
        $encode = $bcrypt->encodePassword($password, true);
        
        $this->password = $encode;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function eraseCredentials() {
        
    }


    /**
     * Set userCreateDate
     *
     * @param \DateTime $userCreateDate
     *
     * @return User
     */
    public function setUserCreateDate($userCreateDate)
    {
        $this->userCreateDate = $userCreateDate;

        return $this;
    }

    /**
     * Get userCreateDate
     *
     * @return \DateTime
     */
    public function getUserCreateDate()
    {
        return $this->userCreateDate;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Add comment
     *
     * @param \DJ\viewBundle\Entity\Comments $comment
     *
     * @return User
     */
    public function addComment(\DJ\viewBundle\Entity\Comments $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \DJ\viewBundle\Entity\Comments $comment
     */
    public function removeComment(\DJ\viewBundle\Entity\Comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set userphoto
     *
     * @param \string $userphoto
     *
     * @return User
     */
    public function setUserphoto($userphoto)
    {
        if(gettype($userphoto)=='string'){
         
            $this->userphoto = $userphoto;
            
        }else{
        $this->userphoto = $userphoto;
        $newnamefile =  md5(uniqid()).'.'.$userphoto->getClientOriginalExtension();
        
        $userphoto->move('../web/photo_user/', $newnamefile);
        
       
        
        $this->userphoto = $newnamefile;
        }
        return $this;
    }

    /**
     * Get userphoto
     *
     * @return \String
     */
    public function getUserphoto()
    {
        return $this->userphoto;
    }
    
    public function sendmail(){
        
       $mailer = new \Swift_Mailer('smtp');
        
     /*   $message = (new \Swift_Message ('Confimation Inscription SnowTricks'))
                ->setFrom('SnowTrick@gmail.com')
                ->setTo('jal.djellouli@gmail.com')
                ->setBody('un mail');
        */
       
    $message = \Swift_Message::newInstance()
        ->setSubject('SnowTrick@gmail.com')
        ->setFrom('jalile59@free.fr')
        ->setTo('jal.djellouli@gmail.com')
        ->setBody('body');
        $this->mailer->send($message);
        
        $mailer->send($message);
        
        
    }
}
