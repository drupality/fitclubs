<?php

namespace FitClubs\Bundle\HPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FitClubsHPBundle:Default:index.html.twig', array('name' => $name));
    }
}
