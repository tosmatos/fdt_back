<?php

namespace App\Controller;

use App\Entity\Employe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Horaires;

class EmployesController extends AbstractController
{
    #[Route('/employes', name: 'app_employes')]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $employes = $em->getRepository(Employe::class)->findAll();
        $employesJson = [];

        foreach ($employes as $employe) {
            $employeId = $employe->getId();
            $employeNom = $employe->getNom();
            $employePrenom = $employe->getPrenom();

            array_push($employesJson, ["id" => $employeId, "nom" => $employeNom, "prenom" => $employePrenom]);
        }
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/EmployesController.php',
            'employes' => $employesJson,
        ]);
    }
}
