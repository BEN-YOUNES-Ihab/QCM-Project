<?php

namespace App\Controller;

use App\Entity\QCM;
use App\Form\QCMType;
use App\Repository\QCMRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/qcm')]
class QCMController extends AbstractController
{
    #[Route('/', name: 'app_q_c_m_index', methods: ['GET'])]
    public function index(QCMRepository $qCMRepository): Response
    {
        return $this->render('qcm/index.html.twig', [
            'q_c_ms' => $qCMRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_q_c_m_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QCMRepository $qCMRepository): Response
    {
        $qCM = new QCM();
        $form = $this->createForm(QCMType::class, $qCM);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qCMRepository->add($qCM, true);

            return $this->redirectToRoute('app_q_c_m_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qcm/new.html.twig', [
            'q_c_m' => $qCM,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_q_c_m_show', methods: ['GET'])]
    public function show(QCM $qCM): Response
    {
        return $this->render('qcm/show.html.twig', [
            'q_c_m' => $qCM,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_q_c_m_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, QCM $qCM, QCMRepository $qCMRepository): Response
    {
        $form = $this->createForm(QCMType::class, $qCM);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qCMRepository->add($qCM, true);

            return $this->redirectToRoute('app_q_c_m_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qcm/edit.html.twig', [
            'q_c_m' => $qCM,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_q_c_m_delete', methods: ['POST'])]
    public function delete(Request $request, QCM $qCM, QCMRepository $qCMRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$qCM->getId(), $request->request->get('_token'))) {
            $qCMRepository->remove($qCM, true);
        }

        return $this->redirectToRoute('app_q_c_m_index', [], Response::HTTP_SEE_OTHER);
    }
}
