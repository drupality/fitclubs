<?php

namespace Drupality\Bundle\FitClubBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DrupalityFitClubBundle:Default:index.html.twig', array('name' => $name));
    }
}
