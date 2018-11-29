<?php
  namespace App\Controller;
  require __DIR__ . '../../../vendor/autoload.php';

  use App\Entity\Arts;

  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;

  use Monolog\Logger;
  use Monolog\Handler\StreamHandler;

  use Symfony\Component\Form\Extension\Core\Type\TextType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;

  class ArtsController extends Controller {
    /**
     * @Route("/arts", name="arts_list")
     * @Method({"GET"})
     */
    public function index() {

      $artsen= $this->getDoctrine()->getRepository(Arts::class)->findAll();

      return $this->render('arts/index.html.twig', array('artsen' => $artsen));
    }

    /**
     * @Route("/arts/new", name="new_arts")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
      $this->denyAccessUnlessGranted('ROLE_VERZEKERING', null, 'User tried to access a page without having ROLE_VERZEKERING');
      $arts = new Arts();

      $form = $this->createFormBuilder($arts)
      ->add('username', TextType::class, array('attr' => array('class' => 'form-control')))
      ->add('password', TextType::class, array('attr' => array('class' => 'form-control')))
      ->add('voornaam', TextType::class, array('attr' => array('class' => 'form-control')))
      ->add('tussenvoegsel', TextType::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
      ->add('achternaam', TextType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('specialiteit', TextType::class, array(
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
        ->add('save', SubmitType::class, array(
          'label' => 'Create',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {
        $arts = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($arts);
        $entityManager->flush();

        return $this->redirectToRoute('arts_list');
      }

      $log = new Logger('addLogs');
      $streamHandler=new StreamHandler('add.log.html', Logger::INFO);
      $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
      $log->pushHandler($streamHandler);

      $log->info('Arts toegevoegd');
    

      return $this->render('arts/new.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/arts/edit/{id}", name="edit_arts")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $this->denyAccessUnlessGranted('ROLE_VERZEKERING', null, 'User tried to access a page without having ROLE_VERZEKERING');
      $arts = new Arts();
      $arts = $this->getDoctrine()->getRepository(Arts::class)->find($id);

      $form = $this->createFormBuilder($arts)
      ->add('id', Texttype::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
        ->add('voornaam', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('username', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('password', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('tussenvoegsel', TextType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('achternaam', TextType::class, array(
            'required' => false,
            'attr' => array('class' => 'form-control')
          ))
          ->add('specialiteit', TextType::class, array(
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
        ->add('save', SubmitType::class, array(
          'label' => 'Update',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('arts_list');
      }

      $log = new Logger('editLogs');
      $streamHandler=new StreamHandler('add.log.html', Logger::INFO);
      $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
      $log->pushHandler($streamHandler);

      $log->info('Arts informatie veranderd');
    

      return $this->render('arts/edit.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/arts/{id}", name="arts_show")
     */
    public function show($id) {
      $arts = $this->getDoctrine()->getRepository(Arts::class)->find($id);

      return $this->render('arts/show.html.twig', array('arts' => $arts));
    }

    /**
     * @Route("/arts/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
      $this->denyAccessUnlessGranted('ROLE_VERZEKERING', null, 'User tried to access a page without having ROLE_VERZEKERING');
      $arts = $this->getDoctrine()->getRepository(Arts::class)->find($id);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($arts);
      $entityManager->flush();

      $response = new Response();
      $response->send();

      $log = new Logger('removeLogs');
      $streamHandler=new StreamHandler('add.log.html', Logger::INFO);
      $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
      $log->pushHandler($streamHandler);

      $log->info('Arts verwijderd');
    }

    // /**
    //  * @Route("/arts/save")
    //  */
    // public function save() {
    //   $entityManager = $this->getDoctrine()->getManager();

    //   $arts = new Arts();
    //   $arts->setTitle('Arts Two');
    //   $arts->setBody('This is the body for arts two');

    //   $entityManager->persist($arts);

    //   $entityManager->flush();

    //   return new Response('Saved an arts with the id of  '.$arts->getId());
    // }
  }
