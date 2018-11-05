<?php
  namespace App\Controller;

  use App\Entity\Patient;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;

  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;

  class PatientController extends Controller {
    /**
     * @Route("/patient", name="patient_list")
     * @Method({"GET"})
     */
    public function index() {

      $patienten= $this->getDoctrine()->getRepository(Patient::class)->findAll();

      return $this->render('patient/index.html.twig', array('patienten' => $patienten));
    }

    /**
     * @Route("/patient/new", name="new_patient")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
      $patient = new Patient();

      $form = $this->createFormBuilder($patient)
      ->add('voornaam', TextType::class, array('attr' => array('class' => 'form-control')))
      ->add('tussenvoegsel', TextType::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
      ->add('achternaam', TextType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('klantnummer', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('adres', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('postcode', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('stad', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('email', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('telefoonnummer', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('dokterid', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
        ->add('save', SubmitType::class, array(
          'label' => 'Create',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $patient = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($patient);
        $entityManager->flush();

        return $this->redirectToRoute('patient_list');
      }

      return $this->render('patient/new.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/patient/edit/{id}", name="edit_patient")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $patient = new Patient();
      $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);

      $form = $this->createFormBuilder($patient)
      ->add('id', Texttype::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
        ->add('voornaam', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('tussenvoegsel', TextType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('achternaam', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('klantnummer', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))  
          ->add('adres', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('postcode', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('stad', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('email', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('telefoonnummer', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('dokterid', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
        ->add('save', SubmitType::class, array(
          'label' => 'Update',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('patient_list');
      }

      return $this->render('patient/edit.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/patient/{id}", name="patient_show")
     */
    public function show($id) {
      $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);

      return $this->render('patient/show.html.twig', array('patient' => $patient));
    }

    /**
     * @Route("/patient/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
      $patient = $this->getDoctrine()->getRepository(Patient::class)->find($id);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($patient);
      $entityManager->flush();

      $response = new Response();
      $response->send();
    }

    // /**
    //  * @Route("/patient/save")
    //  */
    // public function save() {
    //   $entityManager = $this->getDoctrine()->getManager();

    //   $patient = new Patient();
    //   $patient->setTitle('Patient Two');
    //   $patient->setBody('This is the body for patient two');

    //   $entityManager->persist($patient);

    //   $entityManager->flush();

    //   return new Response('Saved an patient with the id of  '.$patient->getId());
    // }
  }
