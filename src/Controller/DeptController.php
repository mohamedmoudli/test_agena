<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Entity\Emp;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeptController extends AbstractController
{
    #[Route('/emp', name: 'app_emp')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $depts = $entityManager->getRepository(Dept::class)->findDept();

        return $this->render('emp/index.html.twig', [
            'depts' => $depts,
        ]);
    }
}
