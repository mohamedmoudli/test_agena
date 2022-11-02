<?php

namespace App\Controller;

use App\Entity\Emp;
use App\Form\EmpType;
use App\Repository\EmpRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employees')]
class EmployeesController extends AbstractController
{
    #[Route('/', name: 'app_employees_index', methods: ['GET'])]
    public function index(EmpRepository $empRepository): Response
    {
        return $this->render('employees/index.html.twig', [
            'emps' => $empRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employees_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmpRepository $empRepository): Response
    {
        $emp = new Emp();
        $form = $this->createForm(EmpType::class, $emp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empRepository->save($emp, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/new.html.twig', [
            'emp' => $emp,
            'form' => $form,
        ]);
    }

    #[Route('/{empNo}', name: 'app_employees_show', methods: ['GET'])]
    public function show(Emp $emp): Response
    {
        return $this->render('employees/show.html.twig', [
            'emp' => $emp,
        ]);
    }

    #[Route('/{empNo}/edit', name: 'app_employees_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Emp $emp, EmpRepository $empRepository): Response
    {
        $form = $this->createForm(EmpType::class, $emp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empRepository->save($emp, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/edit.html.twig', [
            'emp' => $emp,
            'form' => $form,
        ]);
    }

    #[Route('/{empNo}', name: 'app_employees_delete', methods: ['POST'])]
    public function delete(Request $request, Emp $emp, EmpRepository $empRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$emp->getEmpNo(), $request->request->get('_token'))) {
            $empRepository->remove($emp, true);
        }

        return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
    }
}
