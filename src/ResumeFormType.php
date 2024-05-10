<?php

// src/Form/ResumeFormType.php

namespace App;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ResumeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName')
            ->add('age')
            ->add('languages', ChoiceType::class, [
                'label' => 'Languages',
                'choices' => [
                    'English' => 'English',
                    'Arabic' => 'Arabic',
                    'French' => 'French',
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('skills')
            ->add('save', SubmitType::class, ['label' => 'Submit']);
    }
}
