<?php

namespace DJ\viewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="DJ\viewBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_surname", type="string", length=255)
     */
    private $userSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_pseudo", type="string", length=255, nullable=true, unique=true)
     */
    private $userPseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="user_mail", type="string", length=255, nullable=true, unique=true)
     */
    private $userMail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_pwd", type="string", length=255, nullable=true)
     */
    private $userPwd;


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
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userSurname
     *
     * @param string $userSurname
     *
     * @return User
     */
    public function setUserSurname($userSurname)
    {
        $this->userSurname = $userSurname;

        return $this;
    }

    /**
     * Get userSurname
     *
     * @return string
     */
    public function getUserSurname()
    {
        return $this->userSurname;
    }

    /**
     * Set userPseudo
     *
     * @param string $userPseudo
     *
     * @return User
     */
    public function setUserPseudo($userPseudo)
    {
        $this->userPseudo = $userPseudo;

        return $this;
    }

    /**
     * Get userPseudo
     *
     * @return string
     */
    public function getUserPseudo()
    {
        return $this->userPseudo;
    }

    /**
     * Set userMail
     *
     * @param string $userMail
     *
     * @return User
     */
    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;

        return $this;
    }

    /**
     * Get userMail
     *
     * @return string
     */
    public function getUserMail()
    {
        return $this->userMail;
    }

    /**
     * Set userPwd
     *
     * @param string $userPwd
     *
     * @return User
     */
    public function setUserPwd($userPwd)
    {
        $this->userPwd = $userPwd;

        return $this;
    }

    /**
     * Get userPwd
     *
     * @return string
     */
    public function getUserPwd()
    {
        return $this->userPwd;
    }
}

