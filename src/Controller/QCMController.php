<?php

namespace App\Controller;

use App\Entity\QCM;
use App\Form\QCMType;
use App\Repository\QCMRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
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
        $questions = $qCM->getQuestions();
        return $this->renderForm('qcm/new.html.twig', [
            'q_c_m' => $qCM,
            'form' => $form,
            'questions' => $questions,
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

    #[Route('/{id}/questions', name: 'question-qcm', methods: ['GET'])]
    public function questions(QCM $qcm): Response
    {
        
        $questions = $qcm->getQuestions();
        foreach($questions as $question){
            $answers = $question->getAnswers(); 
            
            foreach($answers as $answer){
                $label = $answer->getLabel(); 
               
            }
        }
        
            return $this->render('qcm/qcmquestions.html.twig', [
                'qcm' => $qcm,
                'questions' => $questions,
            ]);
    }
    
    
    #[Route('/newquestion', name: 'newQuestion', methods: ['GET', 'POST'])]
    public function newquestion(Request $request, QuestionRepository $questionRepository): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $questionRepository->add($question, true);
            
            return $this->redirectToRoute('question-qcm', [
                'id' => $id_QCM->getId()
            ]);
        }

        return $this->renderForm('question/new.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }
    

}












    /*
    #[Route('/new/{id_QCM}', name: 'newQuestion', methods: ['GET', 'POST'])]
    public function newquestion(Request $request, QuestionRepository $questionRepository, QCM $id_QCM): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);
        $question->setIdQCM($id_QCM);
        dd($id_QCM);
        if ($form->isSubmitted() && $form->isValid()) {
            $questionRepository->add($question, true);
            
            return $this->redirectToRoute('question-qcm', [
                'id' => $id_QCM->getId()
            ]);
        }

        return $this->renderForm('question/new.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);
    }
    */