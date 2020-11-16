<?php

namespace App\Controller;

use App\Entity\Offres;
use App\Repository\ContratsRepository;
use App\Repository\TypecontratsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffreController extends AbstractController
{
    /**
     * @Route("/{id}", name="offre")
     */
    public function index( Offres $offres, ContratsRepository $contratsRepository, TypecontratsRepository $typecontratsRepository): Response
    {
        $contrat = $contratsRepository->findAll();
        $typecontrats = $contratsRepository->findAll();

        return $this->render('offre/index.html.twig', [
            'offre' => $offres,
        ]);
    }
}
