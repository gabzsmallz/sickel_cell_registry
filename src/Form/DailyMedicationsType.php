<?php

namespace App\Form;

use App\Entity\DailyMedications;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DailyMedicationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prophylactic_antibiotics')
            ->add('prophylactic_antibiotics_date_subscribed')
            ->add('prophylactic_antibiotics_dose')
            ->add('folic_acid')
            ->add('folic_acid_date_subscribed')
            ->add('dose_folic_acid')
            ->add('hydroxyurea')
            ->add('hydroxyurea_date_subscribed')
            ->add('hydroxyurea_dose')
            ->add('compliance')
            ->add('side_effect')
            ->add('notes')
            ->add('patient_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DailyMedications::class,
        ]);
    }
}
