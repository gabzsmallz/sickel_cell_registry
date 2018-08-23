<?php

namespace App\Form;

use App\Entity\Demograhics;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemograhicsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diagnosis')
            ->add('doctor')
            ->add('date_of_last_visit')
            ->add('method_of_contact')
            ->add('purpose_of_visit')
            ->add('patient_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demograhics::class,
        ]);
    }
}
