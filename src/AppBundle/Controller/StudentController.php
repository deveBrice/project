<?php
  namespace AppBundle\Controller;

  use AppBundle\Entity\Student;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\Form\Extension\Core\Type\FormType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\Extension\Core\Type\TextType;

  class StudentController extends Controller 
  {

    /**
     * @Route("/student/add", name="student")
     */
    public function addAction(Request $request)
    {
        $student = new Student();
        $student->setFirstName('');
        $student->setLastName('');
        $student->setNumEtud('');
        
        $formBuilder = $this->createFormBuilder($student);

        $formBuilder
          ->add('FirstName',      TextType::class)
          ->add('LastName',       TextType::class)
          ->add('NumEtud',        TextType::class)
          ->add('Save',           SubmitType::class)
          ->getForm();

          $form = $formBuilder->getForm();
          return $this->render('AppBundle:Student:add.html.twig', array(
          
         'form' => $form->createView(),
      ));
    }

    /**
     * @Route("/hello-world", name="hello-world")
     */
    public function indexAction()
    {
      $content = $this->get('templating')->render('AppBundle:Student:index.html.twig');
    
      return new Response($content);
    }
  }
?>