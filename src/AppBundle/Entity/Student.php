<?php 

namespace AppBundle\Entity;

class Student 
{
    
    private $id;
    private $FirstName;
    private $LastName;
    private $NumEtud;


    public function __construct() 
   {
     /* $this->firstName = new
      $this->lastName = new
      $this->numEtud = new*/
   }

    public function setId($id) 
    {
       $this->id = $id;
    }

    public function getId($id) 
    {
       return $this->id = $id;
    }

    public function setFirstName($firstName) 
    {
       $this->firstName = $firstName;
    }

    public function getFirstName() 
    {
      return $this->firstName;
    }

    public function setLastName($lastName) 
    {
       $this->lastName = $lastName;
    }

    public function getLastName() 
    {
       return $this->lastName;
    }

    public function setNumEtud($numEtud) 
    {
       $this->numEtud = $numEtud;
    }

    public function getNumEtud() 
    {
       return $this->numEtud;
    }

}
?>