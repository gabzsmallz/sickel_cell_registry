<?php

namespace App\Form;

use App\Entity\BaselineData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Patient;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BaselineDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('height')
            ->add('weight')
            ->add('o2_sat')
            ->add('white_blood_cell_count')
            ->add('hemoglobin')
            ->add('platelet')
            ->add('patient_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BaselineData::class,
        ]);
    }
}
