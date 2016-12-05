<?php

namespace UNIPY\CryptBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UNIPYCryptBundle:Default:index.html.twig');
    }
}
