<?php

namespace App\Form;

use App\Entity\SickleCellHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SickleCellHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hospitalization')
            ->add('hospitalization_no_time')
            ->add('aplastic_crisis')
            ->add('dactylitis')
            ->add('retinopathy')
            ->add('splenic_sequestration')
            ->add('acute_chest_syndrome')
            ->add('acute_chest_syndrome_date')
            ->add('avascular_necrosis')
            ->add('icu_admission')
            ->add('icu_admission_date')
            ->add('cholecystectomy')
            ->add('splenectomy')
            ->add('tonsillectomy')
            ->add('tonsillectomy_adenoidectomy')
            ->add('others')
            ->add('patient_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SickleCellHistory::class,
        ]);
    }
}
