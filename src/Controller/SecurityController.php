<?php

namespace App\Controller;
require __DIR__ . '../../../vendor/autoload.php';

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();

        $lastUsername = $utils->getLastUsername();

        $log = new Logger('Security');
        $streamHandler=new StreamHandler('security.log.html', Logger::INFO);
        $streamHandler->setFormatter(new \Monolog\Formatter\HtmlFormatter());
        $log->pushHandler($streamHandler);
  
        $log->info('Gebruiker heeft ingelogd', array(
            // include extra "context" info in your logs
            'Username' => $lastUsername));

        return $this->render('security/login.html.twig', [
            'error'         => $error,
            'last_username' => $lastUsername
        ]);

    }

    /**
     *  @Route("/logout", name="logout")
     */

    public function logout()
    {
      
    }
}
