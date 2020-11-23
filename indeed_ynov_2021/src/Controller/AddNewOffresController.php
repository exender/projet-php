<?php

namespace App\Controller;

use App\Entity\Offres;
use App\Form\AddNewOffreType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddNewOffresController extends AbstractController
{
    /**
     * @Route("/new", name="new_offres")
     */
    public function index(Request $request): Response
    {
        $offre = new Offres();

        $form = $this->createForm(AddNewOffreType::class, $offre);

        $offre->setCreatedAt(new DateTime("now"))
            ->setUpdatedAt(new DateTime("now"));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offre);
            $entityManager->flush();

            return $this->redirectToRoute('offres');
        }

        return $this->render('new_offres/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
