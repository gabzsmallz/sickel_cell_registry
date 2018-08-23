<?php

namespace App\Form;

use App\Entity\InterimHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterimHistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('last_hematology_vist')
            ->add('hematologist')
            ->add('complications_since_last_vist')
            ->add('notes')
            ->add('patient_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InterimHistory::class,
        ]);
    }
}
