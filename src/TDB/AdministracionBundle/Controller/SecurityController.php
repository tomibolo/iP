<?php

namespace TDB\AdministracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('TDBAdministracionBundle:Security:login.html.twig',array('last_username'=>$lastUsername,
            'error'=>$error));
    }
    public function loginCheckAction()
    {

    }

    public function routingAction(){
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $role=$user->getRole();
        switch ($role){
            case 'ROLE_ADMIN':
                return $this->redirectToRoute('tdb_empresa1_home');
                break;
            case 'ROLE_EMPRESA1':
                return $this->redirectToRoute('tdb_empresa1_home');
                break;
            default:    
                return $this->redirectToRoute('tdb_user_logout');
        }
    }
}
