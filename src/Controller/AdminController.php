<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

// Entity
use App\Entity\User;

// Forms
use App\Form\SearchType;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function home()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
    		throw new AccessDeniedException('Accès limité aux administrateurs.');
    	}else{
            return $this->render('admin/home.html.twig', [
                'controller_name' => 'AdminController',
            ]);
        }
    }

    /**
     * @Route("/admin/users", name="admin_users", methods={"POST"}, options={"expose"=true})
     */
    public function users(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Accès limité aux administrateurs.');
        }else{

            $um = $this->get('fos_user.user_manager');
            $em = $this->getDoctrine()->getManager();

            $users = $um->findUsers();

            // Searching function

            $search = $this->get('form.factory')->create(SearchType::class);

            if ($request->isMethod('POST')) {
                $search->handleRequest($request);

                if ($search->isSubmitted()) {
                    
                    $recup = $request->request->all();

                    foreach ($recup as $element) {
                        $name = $element['title'];
                        $users = $em->getRepository(User::class)->getByPattern($name."%");
                    }
                }
            }

            return $this->render('admin/users.html.twig', [
                'users' => $users,
                'search' => $search->createView(),
            ]);
        }
    }

}
