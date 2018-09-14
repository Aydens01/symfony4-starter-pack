<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
    		throw new AccessDeniedException('Accès limité aux administrateurs.');
    	}else{
            return $this->render('admin/home.html.twig', [
                'controller_name' => 'AdminController',
            ]);
        }
    }
}
