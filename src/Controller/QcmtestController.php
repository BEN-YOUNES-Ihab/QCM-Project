<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QcmtestController extends AbstractController
{
    #[Route('/qcmtest', name: 'app_qcmtest')]
    public function index(): Response
    {
        return $this->render('qcmtest/index.html.twig', [
            'controller_name' => 'QcmtestController',
        ]);
    }
}
