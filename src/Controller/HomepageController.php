<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    /**
     * @Route("/home", name="homepage")
     */
    public function index()
    {

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);

        /** @var \App\Entity\Arts $arts */
        $arts = $this->getUser();

        return new Response('<html><body>Hello</body></html> '.$arts->getVoornaam());
        
    }
}
