<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Entity\Task;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class TaskType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('task', TextType::class)
			->add('dueDate', DateType::class, array(
					'widget' => 'single_text',
					'label' => 'Date due',
				)
			)
			->add('status', ChoiceType::class, array(
				'choices' => array(
					'Pending' => 'pending',
					'Processing' => 'processing',
					'Completed' => 'complete'
				),
				'expanded' => true,
				'multiple' => false,
			))
			//TO next form
			->add('nextStep', SubmitType::class)
			//Previous form without validating current
			->add('previousStep', SubmitType::class,array(
				'validation_groups' => false,
			))
			->add('active', ChoiceType::class, array(
				'choices' => array(
					'now' => new \DateTime('now'),
					'tommorow' => new \DateTime('+1 day'),
					'1 week' => new \DateTime('+1 week'),
					'1 month' => new \DateTime('+1 month'),
				),
				'group_by' => function($choiceValue, $key, $value){
					if($choiceValue <= new \DateTime('+3 days')){
						return 'Soon';
					}else{
						return 'Later';
					}
				},
				'preferred_choices' => function($value,$key){
					return $value <= new \DateTime('+3 days');
				},
				
			))
			//unmapping extra field don't exist on mapped object
			->add('agreeTerms', CheckboxType::class, array('mapped' => false))
			->add('file', FileType::class, array('label' => 'Upload'))
			->add('save', SubmitType::class, array('label' => 'Create Task'));
	}
	
	//set class that holds the underlying data guessed based on object passed
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => Task::class,
		));
	}
}