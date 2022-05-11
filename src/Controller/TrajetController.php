<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Trajet;


class TrajetController extends AbstractController
{
    /**
     * @Route("/trajet", name="trajet")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TrajetController.php',
        ]);
    }


    /**
     * @Route("/insertTrajet/{nom}",name="insertTrajet",requirements={"nom"="[a-z]{4,30}"})
     */
    public function insert(Request $request, $nom)
    {
        $traj = new Trajet();
        $traj->setNom($nom);
        if ($request->isMethod('get')) {
            //récupération de l'entityManager pour insérer les données en bdd
            $em = $this->getDoctrine()->getManager();

            $em->persist($traj);
            //insertion en bdd
            $em->flush();
            $resultat = ["ok"];
        } else {
            $resultat = ["nok"];
        }

        $reponse = new JsonResponse($resultat);
        return $reponse;
    }

    /**
     * @Route("/deleteTrajet/{id}", name="deleteTrajet",requirements={"id"="[0-9]{1,5}"})
     */
    public function delete(Request $request, $id)
    {
        //récupération du Manager et du repository pour accéder à la bdd
        $em = $this->getDoctrine()->getManager();
        $trajetRepository = $em->getRepository(Trajet::class);
        //requete de selection
        $traj = $trajetRepository->find($id);
        //suppression de l'entity
        $em->remove($traj);
        $em->flush();
        $resultat = ["ok"];
        $reponse = new JsonResponse($resultat);
        return $reponse;
    }
}
