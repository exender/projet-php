<?php

namespace App\Controller;


use App\Repository\ContratsRepository;
use App\Repository\OffresRepository;
use App\Repository\TypecontratsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class OffresController extends AbstractController
{
    /**
     * @Route("/", name="offres")
     */
    public function index(OffresRepository $offresRepository, ContratsRepository $contratsRepository, TypecontratsRepository $typecontratsRepository): Response
    {
        $offres = $offresRepository->findAll();
        $contrat = $contratsRepository->findAll();
        $typecontrats = $typecontratsRepository->findAll();

        return $this->render('offres/index.html.twig', [
            'offres' => $offres
        ]);
    }
}
