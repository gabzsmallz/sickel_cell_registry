<?php

namespace App\Form;

use App\Entity\HealthMaintenance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HealthMaintenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tcd_screening_date')
            ->add('tcd_screening_result')
            ->add('recommendations')
            ->add('next_tcd_screening_date')
            ->add('specialist')
            ->add('specialist_visit_date')
            ->add('notes')
            ->add('immunization')
            ->add('immunization_date')
            ->add('patient_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HealthMaintenance::class,
        ]);
    }
}
