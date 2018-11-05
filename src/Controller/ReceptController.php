<?php
  namespace App\Controller;

  use App\Entity\Recept;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;

  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;

  class ReceptController extends Controller {
    /**
     * @Route("/recept", name="recept_list")
     * @Method({"GET"})
     */
    public function index() {

      $recepten= $this->getDoctrine()->getRepository(Recept::class)->findAll();

      return $this->render('recept/index.html.twig', array('recepten' => $recepten));
    }

    /**
     * @Route("/recept/new", name="new_recept")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
      $recept = new Recept();

      $form = $this->createFormBuilder($recept)
      ->add('patientid', TextType::class, array('attr' => array('class' => 'form-control')))
      ->add('medicijnid', TextType::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
      ->add('aantal', TextType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('hoelang', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('herhaling', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('uitgeschreven', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('dokterid', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('opgehaald', TextType::class, array(
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
        $recept = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($recept);
        $entityManager->flush();

        return $this->redirectToRoute('recept_list');
      }

      return $this->render('recept/new.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/recept/edit/{id}", name="edit_recept")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $recept = new recept();
      $recept = $this->getDoctrine()->getRepository(Recept::class)->find($id);

      $form = $this->createFormBuilder($recept)
      ->add('id', Texttype::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
        ->add('patientid', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('medicijnid', TextType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('aantal', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('hoelang', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))  
          ->add('herhaling', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('uitgeschreven', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('dokterid', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('opgehaald', TextType::class, array(
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

        return $this->redirectToRoute('recept_list');
      }

      return $this->render('recept/edit.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/recept/{id}", name="recept_show")
     */
    public function show($id) {
      $recept = $this->getDoctrine()->getRepository(Recept::class)->find($id);

      return $this->render('recept/show.html.twig', array('recept' => $recept));
    }

    /**
     * @Route("/recept/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
      $recept = $this->getDoctrine()->getRepository(Recept::class)->find($id);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($recept);
      $entityManager->flush();

      $response = new Response();
      $response->send();
    }

    // /**
    //  * @Route("/recept/save")
    //  */
    // public function save() {
    //   $entityManager = $this->getDoctrine()->getManager();

    //   $recept = new Recept();
    //   $recept->setTitle('Recept Two');
    //   $recept->setBody('This is the body for recept two');

    //   $entityManager->persist($recept);

    //   $entityManager->flush();

    //   return new Response('Saved an recept with the id of  '.$parecepttient->getId());
    // }
  }
