<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Entity\Department;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Student controller.
 *
 * @Route("student")
 */
class StudentController extends Controller
{
    /**
     * Lists all student entities.
     *
     * @Route("/", name="students_list")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $students = $em->getRepository('AppBundle:Student')->findAll();

        return $this->render('AppBundle:Student:index.html.twig', array(
            'students' => $students,
        ));
    }

    /**
     * 
     *
     * @Route("/new", name="students_add")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request)
    {
        $student = new Student();
        $form = $this->createForm('AppBundle\Form\StudentType', $student);
        $form->handleRequest($request);
         var_dump($student);
        // $department = new Department();
       

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
           // $em->persist($department);
            $em->flush();

            return $this->redirectToRoute('students_list', array('id' => $student->getId()));
        }

        return $this->render('AppBundle:Student:add.html.twig', array(
            'student' => $student,
            'form' => $form->createView(),
        ));
    }

    /**
     * 
     *
     * @Route("/{id}/edit", name="students_update")
     * @Method({"GET", "POST"})
     */
    public function updateAction(Request $request, Student $student)
    {
        $deleteForm = $this->createDeleteForm($student);
        $editForm = $this->createForm('AppBundle\Form\StudentType', $student);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_list', array('id' => $student->getId()));
        }

        return $this->render('AppBundle:Student:update.html.twig', array(
            'student' => $student,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a student entity.
     *
     * @Route("/delete/{id}", name="students_delete")
     * 
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('AppBundle:Student')->find($id);

        if (!$post) {
            return $this->redirectToRoute('list');
        }

        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('students_list');
    }

    
    private function createDeleteForm(Student $student)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('students_delete', array('id' => $student->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    

    /**
     * 
     * @Route("/add")
     */
    public function addStudent()
    {
        $department = new Department();
        $department->setName("test");
        $department->setCapacity("1");

        $student = new Student();
        $student->setfirstName("Raizaki");
        $student->setlastName("Akazuki");
        $student->setnumEtud("2");
        $student->setDepartment($department);

        $doc = $this->getDoctrine()->getManager();
        $doc->persist($department);
        $doc->persist($student);
        $doc->flush();

    }
}
