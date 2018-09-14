<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function home()
    {
        return $this->render('app/home.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}
