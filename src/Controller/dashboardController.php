<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Form\TaskType;

class dashboardController extends AbstractController
{
	/**
	* @Route("/", name="homepage")
	*/
	public function index(SessionInterface $session, Request $request)
	{
		//throw $this->createNotFoundException('Test.......');	
		//$session->set('name','value');
		/*return new Response(
			'<html><body><div class="header"><h1>Welcome to Kisumu County Sickle cell registry</h1></div><div class="content"><p>Login</p></div></body></html>'
		);*/
		//$session_id=$request->cookies->get('PHPSESSID');
		//$host=$request->server->get('HTTP_HOST');
		//$array=['some','data','in','an','array','that','is','to','be','looped'];
		//$description='I &lt;3 this product';
		//return $this->render('dashboard/index.html.twig',array('host'=>$host,'array' =>$array,'desc' =>$description));
		return $this->render('dashboard/index.html.twig',array());
	}
	
	/**
	*	@Route("/form/new", name="new_form")
	*/
	public function new(Request $request)
	{
		//create a task and give dummy data
		$task=new Task();
		$task->setTask('Write a blog post');
		$task->setDueDate(new \DateTime('tomorrow'));
		/*$form=$this->createForm(TaskType::class, $task,array(
			'action' => $this->generateUrl('submit_form'),
			'method' => 'POST',
		));*/
		$form=$this->createForm(TaskType::class, $task);
		/*$form=$this->createFormBuilder($task)
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

			->add('save', SubmitType::class, array('label' => 'Create Task'))
			->getForm();*/
		$form->handleRequest($request);
		
		if($form->isSubmitted() /*&& $form->isValid()*/){
			//$form->getData() holds the submitted value
			//original task has been updated
			$task=$form->getData();
			
			//get data
			//error_log('Value '.$form->get('agreeTerms')->getData());
			
			//saving to database
			//doctrine entity
			//$entityManager=$this->getDoctrine()->getManager();
			//$entityManager->persist($task);
			//$entityManager->flush();
			
			return $this->redirectToRoute('new_success');
		}
		return $this->render('dashboard/new.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	/**
	*	@Route("/form/submit", name="submit_form")
	*/
	public function process(Request $request)
	{
		//$value=$request->query->get('value');
		//return new Response('Hello '.$value, Response::HTTP_OK);
		//$response= new Response('<style>.flash-notice{ background: red}</style>');
		//$response->headers->set('Content-Type', 'text/css');
		//return $response;
		
		//JSON
		//return $this->json(array('username' => 'j.doe'));
		//return $this->render('dashboard/index.html.twig',array('host'=>$value));
		
		$task=new Task();
		
		$form=$this->createForm(TaskType::class, $task);
		$form->handleRequest($request);
		if($form->isSubmitted() /*&& $form->isValid()*/){
			//$form->getData() holds the submitted value
			//original task has been updated
			//$task=$form->getData();
			$file=$task->getFile();
			
			$filename= $this->generateUnqiueFileName().'.'.$file->guessExtension();
			
			//move file
			$file->move(
				$this->getParameter('uploads'),
				$filename
			);
			
			//update store new name
			$task->setFile($filename);
			//get data
			//error_log('Value '.$form->get('agreeTerms')->getData());
			
			//saving to database
			//doctrine entity
			//$entityManager=$this->getDoctrine()->getManager();
			//$entityManager->persist($task);
			//$entityManager->flush();
			
			$this->addFlash(
				'notice',
				$task->getTask().' Changes been saved!'
			);
			
			//next action
			$nextAction=$form->get('nextStep')->isClicked()? 'new_form':'new_success';
			return $this->redirectToRoute($nextAction);
		}
		return $this->render('dashboard/new.html.twig', array(
			'form' => $form->createView(),
		));

		//return $this->redirectToRoute('homepage');
		
		//$file = new File('/path');
		//return $this->file('/path');
		//return $this->file('/path','custome_name');
		//return $this->file('/path/some.pdf','my_pdf.pdf',ResponseHeaderBag::DISPOSITION_INLINE);
	}
	
	/**
	* @Route("/form/success", name="new_success")
	*/
	public function success()
	{
		return $this->render('dashboard/success.html.twig', array());
	}
	
	private function generateUnqiueFileName()
	{
		//uniqid based on timestamps
		return md5(uniqid());
	}
	
}