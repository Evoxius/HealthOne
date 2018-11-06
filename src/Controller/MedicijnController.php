<?php
  namespace App\Controller;
  require __DIR__ . '../../../vendor/autoload.php';
 
  use App\Entity\Medicijn;
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

  class MedicijnController extends Controller {
    /**
     * @Route("/medicijn", name="medicijn_list")
     * @Method({"GET"})
     */
    public function index() {

      $medicijnen= $this->getDoctrine()->getRepository(Medicijn::class)->findAll();

      return $this->render('medicijn/index.html.twig', array('medicijnen' => $medicijnen));
    }

    /**
     * @Route("/medicijn/new", name="new_medicijn")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
      $medicijn = new Medicijn();

      $form = $this->createFormBuilder($medicijn)
        ->add('naam', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('voordelen', TextareaType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('nadelen', TextareaType::class, array(
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
        $medicijn = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($medicijn);
        $entityManager->flush();

        return $this->redirectToRoute('medicijn_list');
      }


      $log = new Logger('addLogs');
      $streamHandler=new StreamHandler('add.log.html', Logger::INFO);
      $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
      $log->pushHandler($streamHandler);

      $log->info('Medicijn toegevoegd');
    

      return $this->render('medicijn/new.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/medicijn/edit/{id}", name="edit_medicijn")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
      $medicijn = new Medicijn();
      $medicijn = $this->getDoctrine()->getRepository(Medicijn::class)->find($id);

      $form = $this->createFormBuilder($medicijn)
      ->add('id', TextType::class, array(
        'required' => false,
        'attr' => array('class' => 'form-control')
      ))
        ->add('naam', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('voordelen', TextareaType::class, array(
          'required' => false,
          'attr' => array('class' => 'form-control')
        ))
        ->add('nadelen', TextareaType::class, array(
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

        return $this->redirectToRoute('medicijn_list');
      }

      $log = new Logger('editLogs');
      $streamHandler=new StreamHandler('add.log.html', Logger::INFO);
      $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
      $log->pushHandler($streamHandler);

      $log->info('Medicijn informatie veranderd');

      return $this->render('medicijn/edit.html.twig', array(
        'form' => $form->createView()
      ));
    }

    /**
     * @Route("/medicijn/{id}", name="medicijn_show")
     */
    public function show($id) {
      $medicijn = $this->getDoctrine()->getRepository(Medicijn::class)->find($id);

      return $this->render('medicijn/show.html.twig', array('medicijn' => $medicijn));
    }

    /**
     * @Route("/medicijn/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
      $medicijn = $this->getDoctrine()->getRepository(Medicijn::class)->find($id);

      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->remove($medicijn);
      $entityManager->flush();

      $response = new Response();
      $response->send();

      
      $log = new Logger('removeLogs');
      $streamHandler=new StreamHandler('add.log.html', Logger::INFO);
      $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
      $log->pushHandler($streamHandler);

      $log->info('Medicijn verwijderd');
    }

    

    

    // /**
    //  * @Route("/medicijn/save")
    //  */
    // public function save() {
    //   $entityManager = $this->getDoctrine()->getManager();

    //   $medicijn = new Medicijn();
    //   $medicijn->setTitle('Medicijn Two');
    //   $medicijn->setBody('This is the body for medicijn two');

    //   $entityManager->persist($medicijn);

    //   $entityManager->flush();

    //   return new Response('Saved an medicijn with the id of  '.$medicijn->getId());
    // }
  }
