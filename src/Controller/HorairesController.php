<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Horaires;

class HorairesController extends AbstractController
{
    #[Route('/horaires/{id}', name: 'app_horaires')]
    public function index(EntityManagerInterface $em, int $id): JsonResponse
    {
        $horaires = $em->getRepository(Horaires::class)->findBy(["employe_id" => $id]);

        $horairesJson = [];

        foreach ($horaires as $horaire) {
            array_push($horairesJson, $horaire->getAllHoraires());
        }

        //var_dump($horairesJson);
        //$horaire->gg();

        return $this->json($horairesJson);
    }

    #[Route('horaires/{id}/{semaine}', name: 'app_horaires_semaine')]
    public function horairesSemaine(EntityManagerInterface $em, int $id, int $semaine): JsonResponse
    {
        $horairesSemaine = $em->getRepository(Horaires::class)->findBy(["employe_id" => $id, "semaine" => $semaine]);

        return $this->json(
            $horairesSemaine[0]->getAllHoraires(),
        );
    }
}
