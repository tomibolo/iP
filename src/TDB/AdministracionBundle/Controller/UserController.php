<?php

namespace TDB\AdministracionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public  function indexAction(){


        return $this->render('TDBAdministracionBundle:Users:index.html.twig');

    }

}
