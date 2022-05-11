<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ville;
use Symfony\Component\HttpFoundation\JsonResponse;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville", name="ville")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/VilleController.php',
        ]);
    }

    /**
     * @Route("/insertVille/{ville}/{codePostal}",
    name="insertVille")
     */
     public function insert(Request $request,$ville,$codePostal)
     {
     $ville=new Ville();
     $ville->setVille($ville);
     $ville->setCodePostal($codePostal);
     if($request->isMethod('get')){
     //récupération de l'entityManager pour insérer les données en bdd
     $em=$this->getDoctrine()->getManager();

     $em->persist($ville);
     //insertion en bdd
     $em->flush();
     $resultat=["ok"];
     }
     else {
     $resultat=["nok"];
     }

     $reponse=new JsonResponse($resultat);
     return $reponse;

     }

     /**
     * @Route("/deleteVille/{id}", name="deleteVille",requirements={"id"="[0-9]{1,5}"})
     */
     public function delete(Request $request,$id)
     {
     //récupération du Manager et du repository pour accéder à la bdd
     $em=$this->getDoctrine()->getManager();
     $villeRepository=$em->getRepository(Ville::class);
     //requete de selection
     $ville=$villeRepository->find($id);
     //suppression de l'entity
     $em->remove($ville);
     $em->flush();
     $resultat=["ok"];
     $reponse=new JsonResponse($resultat);
     return $reponse;
     }
}
