<?php

namespace FitClubs\Bundle\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('FitClubsIndexBundle:Index:index.html.twig', array(
                // ...
            ));    }

}
