<?php

namespace App\Form;

use App\Entity\StudentAnswer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentAnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Result')
            ->add('user_id')
            ->add('answers_id')
            ->add('QCM_id')
            ->add('question_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StudentAnswer::class,
        ]);
    }
}
