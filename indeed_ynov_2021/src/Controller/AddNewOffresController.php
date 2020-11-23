<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddNewOffresController extends AbstractController
{
    /**
     * @Route("/add/new/offres", name="add_new_offres")
     */
    public function index(): Response
    {
        return $this->render('add_new_offres/index.html.twig', [
            'controller_name' => 'AddNewOffresController',
        ]);
    }
}
