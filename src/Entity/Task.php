<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Task
{
	/**
	*	@Assert\NotBlank()
	*/
	protected $task;
	
	/**
	*	@Assert\NotBlank()
	*	@Assert\Type("\DateTime")
	*/
	protected $dueDate;
	
	/**
	*	@Assert\NotBlank()
	**/
	protected $status;
	
	/**
	*	@Assert\NotBlank()
	*	@Assert\Type("Boolean")
	**/
	protected $active;
	
	/**
	*	@Assert\NotBlank(message="Please upload PDF")
	*	@Assert\File(mimeTypes={ "application/pdf" })
	*/
	protected $file;
	
	public function getTask()
	{
		return $this->task;
	}
	
	public function setTask($task)
	{
		$this->task= $task;
	}
	
	public function getDueDate()
	{
		return $this->dueDate;
	}
	
	public function setDueDate(\DateTime $dueDate=null)
	{
		$this->dueDate= $dueDate;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setStatus($status)
	{
		$this->status=$status;
	}
	
	public function isActive()
	{
		return $this->active;
	}
	
	public function setActive($active)
	{
		$this->active=$active;
	}
	public function getFile()
	{
		return $this->file;
	}
	
	public function setFile($file)
	{
		$this->file=$file;
		
		return $this;
	}
}