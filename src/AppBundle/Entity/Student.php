<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
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
     * @ORM\Column(name="FirstName", type="string", length=25)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=25)
     */
    private $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="NumEtud", type="integer")
     */
    private $numEtud;


   
    public function getId()
    {
        return $this->id;
    }


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

  
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

  
    public function setNumEtud($numEtud)
    {
        $this->numEtud = $numEtud;

        return $this;
    }

  
    public function getNumEtud()
    {
        return $this->numEtud;
    }
}

