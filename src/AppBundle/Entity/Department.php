<?php 
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartmentRepository")
 */


class Department
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
     * @ORM\Column(name="Name", type="string", length=25)
     */
    private $Name;

    /**
     * @var int
     *
     * @ORM\Column(name="Capacity", type="integer", length=10)
     */
    private $Capacity;

    /**
     * @ORM\OneToMany(targetEntity="Student", mappedBy="department")
     * 
     */
    private $student;

    public function __construct()
    {
        $this->student = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }


    public function getName()
    {
        return $this->Name;
    }

  
    public function setCapacity($Capacity)
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getCapacity()
    {
        return $this->Capacity;
    }

 

    /**
     * Add Student
     * 
     * @param \AppBundle\Entity\Student $student
     * 
     * @return Department
     */

    public function addStudent(\AppBundle\Entity\Student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove Student
     * 
     * @param \AppBundle\Entity\Student $student
     * 
     */

    public function removeStudent(\AppBundle\Entity\Student $student)
    {
        $this->student->removeElement($student);

        return $this;
    }

   /**
    * Get Student
    * 
    * 
    * @return \Doctrine\Common\Collections\Collection
    */

   public function getStudent()
   {

       return $this->student;
   }
}
?>